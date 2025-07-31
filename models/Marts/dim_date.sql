With d_1 as (

select  * from 
{{ ref ('dateFetch')}}
 ) ,

d_2 as (
select CC_CALL_CENTER_ID,cc_rec_start_date from SNOWFLAKE_SAMPLE_DATA.TPCDS_SF100TCL.CALL_CENTER
),

final as (
select d_1.CC_CALL_CENTER_ID,d_1.cc_rec_start_date from 
d_1 join d_2 on d_1.CC_CALL_CENTER_ID = d_2.CC_CALL_CENTER_ID)

Select CC_CALL_CENTER_ID,cc_rec_start_date  from final 
