<?php 

$nameArrowClass = ($sortField === 'name') ? ($sortOrder === 'asc' ? 'arrow-up' : 'arrow-down') : '';
$phoneArrowClass = ($sortField === 'phone') ? ($sortOrder === 'asc' ? 'arrow-up' : 'arrow-down') : '';
$emailArrowClass = ($sortField === 'email') ? ($sortOrder === 'asc' ? 'arrow-up' : 'arrow-down') : '';
$companyArrowClass = ($sortField === 'company_id') ? ($sortOrder === 'asc' ? 'arrow-up' : 'arrow-down') : '';
$createdAtArrowClass = ($sortField === 'created_at') ? ($sortOrder === 'asc' ? 'arrow-up' : 'arrow-down') : '';

?>