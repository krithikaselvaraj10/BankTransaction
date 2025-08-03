With d_1 as (

select  * from 
{{ ref ('dateFetch')}}
 ) ,

d_2 as (
select CC_CALL_CENTER_ID,cc_rec_start_date from SNOWFLAKE_SAMPLE_DATA.TPCDS_SF100TCL.CALL_CENTER
),

d_3 as (
    select * from {{ ref ('fact_taxPercent') }}
),

final as (
select d_1.CC_CALL_CENTER_ID,d_1.cc_rec_start_date,d_3.C_SALUTATION from 
d_1 join d_2 on d_1.CC_CALL_CENTER_ID = d_2.CC_CALL_CENTER_ID and 
d_1 join d_3 on d_1.cc_call_center_id = d_3.cc_call_center_id)


Select CC_CALL_CENTER_ID,cc_rec_start_date,C_SALUTATION  from final 