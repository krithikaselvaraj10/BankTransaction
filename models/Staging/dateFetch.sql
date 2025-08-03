select CC_CALL_CENTER_ID,cc_rec_start_date 
from {{ source('Demo', 'CALL_CENTER') }}   
where cc_rec_start_date > '1998-01-01'