select distinct d.cc_call_center_id, d.cc_tax_percentage ,c.C_SALUTATION 
from {{ source('Demo', 'customer') }} as c join {{ source('Demo', 'CALL_CENTER') }}  as d 
on c.c_customer_id = d.cc_call_center_id 
where d.cc_tax_percentage > 0