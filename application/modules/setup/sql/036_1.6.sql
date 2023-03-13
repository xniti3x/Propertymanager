ALTER TABLE `ip_invoices_recurring` CHANGE `recur_end_date` `recur_end_date` DATE NULL;
ALTER TABLE `ip_invoices_recurring` CHANGE `recur_next_date` `recur_next_date` DATE NULL;
ALTER TABLE `ip_clients` ADD `client_vertrag_id` INT NULL ;
ALTER TABLE `ip_invoices` ADD `invoice_period_start` DATE NOT NULL AFTER `invoice_date_due`;
ALTER TABLE `ip_invoices` ADD `invoice_period_end` DATE NOT NULL AFTER `invoice_date_due`;