ALTER TABLE `ip_invoices_recurring` CHANGE `recur_end_date` `recur_end_date` DATE NULL;
ALTER TABLE `ip_invoices_recurring` CHANGE `recur_next_date` `recur_next_date` DATE NULL;

ALTER TABLE `ip_invoices` ADD `invoice_period_end` DATE NOT NULL AFTER `invoice_date_due`;
ALTER TABLE `ip_invoices` ADD `invoice_period_start` DATE NOT NULL AFTER `invoice_date_due`;

#Username demo@invoiceplane.com
#Password demopassword

INSERT INTO `ip_users` (`user_type`, `user_active`, `user_date_created`, `user_date_modified`, `user_language`, `user_name`, `user_company`, `user_address_1`, `user_address_2`, `user_city`, `user_state`, `user_zip`, `user_country`, `user_phone`, `user_fax`, `user_mobile`, `user_email`, `user_password`, `user_web`, `user_vat_id`, `user_tax_code`, `user_psalt`, `user_passwordreset_token`, `user_subscribernumber`, `user_iban`, `user_gln`, `user_rcc`)
VALUES (1, 1, '2017-04-23 17:29:31', '2017-04-23 17:29:31', 'system', 'InvoicePlane Demo', NULL, 'Test Street', '', '', '', '', 'US', '', '', '', 'demo@invoiceplane.com', '$2a$10$586b8f3f5a93f2b62623de1.JtIdo3wT/cNZuYx/KhkglXlegxAXK', 'https://invoiceplane.com', NULL, NULL, '586b8f3f5a93f2b62623de', '', NULL, NULL, NULL, NULL);

CREATE TABLE IF NOT EXISTS `ip_appartment` 
(
    `appartment_id` INT(11) NOT NULL AUTO_INCREMENT,
    `appartment_title` VARCHAR(255),
    `appartment_raume` VARCHAR(255),
    `appartment_qm` VARCHAR(255),
    PRIMARY KEY (`appartment_id`) 
);

CREATE TABLE IF NOT EXISTS `ip_transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transactionId` varchar(255) NOT NULL,
  `bookingDate` date DEFAULT NULL,
  `valueDate` date DEFAULT NULL,
  `transactionAmount` double DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `iban` varchar(255) DEFAULT NULL,
  `remittanceInformationStructured` text,
  `additionalInformation` varchar(255) DEFAULT NULL,
  `note` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `ip_vertrag` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `appartment_id` int(11) NOT NULL,
  `vermieter` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `kaltmiete` varchar(255) NOT NULL,
  `nebenkosten` varchar(255) NOT NULL,
  `iban` varchar(255) NOT NULL,
  `kaution` varchar(255) NOT NULL,
  `kautionart` varchar(255) NOT NULL,
  `begin` varchar(255) NOT NULL,
  `ende` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `ip_vertrag` ADD PRIMARY KEY (`id`);
ALTER TABLE `ip_vertrag` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT; COMMIT;

ALTER TABLE `ip_clients` ADD `client_iban` VARCHAR(55) NOT NULL AFTER `client_gender`;
ALTER TABLE `ip_clients` ADD `client_iban_partner` VARCHAR(55) NOT NULL AFTER `client_gender`;