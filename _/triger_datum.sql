create or replace
trigger t_dat_komentare
before insert on komentare
for each row
begin
 select sysdate into :new.datum from dual;
end;