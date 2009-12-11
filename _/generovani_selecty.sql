/* zjištění nevrácených výpůjček */
select tpujcujici.jmeno as JMENO, tpujcujici.prijmeni as PRIJMENI, to_date(tvypujcka.datum_pujceni, 'DD.MM.RR') as DATUM_PUJCENI, ttitul.cz as CZ, ttitul.original as ORIGINAL from tpujcujici, tfilmoteka, ttitul
left join tvypujcka on tvypujcka.datum_vraceni is null
where tvypujcka.nick = tpujcujici.nick and tvypujcka.katalogove_cislo= tfilmoteka.katalogove_cislo and tfilmoteka.film_id=ttitul.film_id
order by tpujcujici.prijmeni;

/* počet nevrácených filmů */
select count(*) from tpujcujici
left join tvypujcka on tvypujcka.datum_vraceni is null
where tvypujcka.nick = tpujcujici.nick
order by tpujcujici.prijmeni;