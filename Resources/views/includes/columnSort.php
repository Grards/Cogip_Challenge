<?php 
// Contacts

$nameArrowClass = ($sortField === 'name') ? ($sortOrder === 'asc' ? 'arrow-up' : 'arrow-down') : '';
$phoneArrowClass = ($sortField === 'phone') ? ($sortOrder === 'asc' ? 'arrow-up' : 'arrow-down') : '';
$emailArrowClass = ($sortField === 'email') ? ($sortOrder === 'asc' ? 'arrow-up' : 'arrow-down') : '';
$companyArrowClass = ($sortField === 'company_id') ? ($sortOrder === 'asc' ? 'arrow-up' : 'arrow-down') : '';
$createdAtArrowClass = ($sortField === 'contacts.created_at') ? ($sortOrder === 'asc' ? 'arrow-up' : 'arrow-down') : '';

// Invoices

$refArrowClass = ($sortField === 'ref') ? ($sortOrder === 'asc' ? 'arrow-up' : 'arrow-down') : '';
$dueDateArrowClass = ($sortField === 'due_date') ? ($sortOrder === 'asc' ? 'arrow-up' : 'arrow-down') : '';
$companyNameArrowClass = ($sortField === 'id_company') ? ($sortOrder === 'asc' ? 'arrow-up' : 'arrow-down') : '';
$priceArrowClass = ($sortField === 'price') ? ($sortOrder === 'asc' ? 'arrow-up' : 'arrow-down') : '';
$invoiceCreatedAtArrowClass = ($sortField === 'invoices.created_at') ? ($sortOrder === 'asc' ? 'arrow-up' : 'arrow-down') :'';

// Companies

$companiesNameArrowClass = ($sortField === 'companies.name') ? ($sortOrder === 'asc' ? 'arrow-up' : 'arrow-down') : '';
$typesNameArrowClass = ($sortField === 'type_id') ? ($sortOrder === 'asc' ? 'arrow-up' : 'arrow-down') : '';
$companiesCountryArrowClass = ($sortField === 'country') ? ($sortOrder === 'asc' ? 'arrow-up' : 'arrow-down') : '';
$companiesTvaArrowClass = ($sortField === 'tva') ? ($sortOrder === 'asc' ? 'arrow-up' : 'arrow-down') : '';
$companinesCreatedAtArrowClass = ($sortField === 'companies.created_at') ? ($sortOrder === 'asc' ? 'arrow-up' : 'arrow-down') :'';
?>