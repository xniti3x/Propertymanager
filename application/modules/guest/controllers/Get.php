<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

/*
 * InvoicePlane
 *
 * @author      InvoicePlane Developers & Contributors
 * @copyright   Copyright (c) 2012 - 2018 InvoicePlane.com
 * @license     https://invoiceplane.com/license.txt
 * @link        https://invoiceplane.com
 */

/**
 * Class Guest
 */
class Get extends Base_Controller
{
    public function attachment($filename)
    {
        $path = UPLOADS_CFILES_FOLDER;
        $filePath = $path . $filename;

        if (strpos(realpath($filePath), $path) !== 0) {
            header("Status: 403 Forbidden");
            echo '<h1>Forbidden</h1>';
            exit;
        }

        $filePath = realpath($filePath);

        if (file_exists($filePath)) {
            $pathParts = pathinfo($filePath);
            $fileExt = $pathParts['extension'];
            $fileSize = filesize($filePath);

            header("Expires: -1");
            header("Cache-Control: public, must-revalidate, post-check=0, pre-check=0");
            header("Content-Disposition: attachment; filename=\"$filename\"");
            header("Content-Type: application/octet-stream");
            header("Content-Length: " . $fileSize);

            echo file_get_contents($filePath);
            exit;
        }

        show_404();
        exit;
    }

    public function fireNotification($cron_key)
    {
        $this->load->model('invoices/mdl_invoices');
        $this->load->model('settings/mdl_settings');
        
       if (strcmp($cron_key, $this->mdl_settings->get('cron_key')) !== 0) { exit;} 
        $url = $this->mdl_settings->get('ntfy_url');
        date_default_timezone_set('Europe/Berlin');
        $this->mdl_invoices->is_draft();
        $this->mdl_invoices->paginate(site_url('invoices/status/' . 'draft'), 0);
        $items = $this->mdl_invoices->result();

        
        $i=0;
        foreach($items as $item){
            $header=array(
                "Title:".$item->invoice_number." - Miete - ".substr($item->client_name, 0, 20)."..",
                "Priority:3",
                "Tags:memo",
                "Actions:view, Anzeigen, ".site_url("invoices/view/".$item->invoice_id),
                "Authorization: ".$this->mdl_settings->get('ntfy_basic_auth'),
                "Content-Type: text/plain"
            );
            $body="Zeitraum: ".$item->invoice_period_start." bis ".$item->invoice_period_end." Offenerbetrag: ".$item->invoice_balance;
            $this->httpPost($url,$body,$header);
            if($i>3) break; $i++;
        }
    }
    
    private function httpPost($url, $data,$header)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_HEADER, true);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);
        curl_close($curl);
        return $response;
    }

}
