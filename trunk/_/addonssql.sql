/* NASEPTAVAC */
--select cz, en, original, substr(popis,0,50) from ttitul where lower(ttitul.cz) like lower('%Y%') or lower(ttitul.en) like lower('%y%') or lower(ttitul.original) like lower('%y%');
--select cz, en, original, substr(popis, instr(lower(popis),lower('%žije%')),50) as popiszkracen from ttitul where lower(popis) like lower('%žije%');
-- select instr(lower(popis),lower('%e%')) from ttitul; -- vypisuje furt 0 :/
--select cz as CZ, en as EN, original as ORIGINAL, to_char(substr(popis,0,50)) as POPIS from ttitul where lower(ttitul.cz) like lower('%ces%') or lower(ttitul.en) like lower('%ces%') or lower(ttitul.original) like lower('%ces%');