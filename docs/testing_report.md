# Tesztjegyzőkönyv

### Tesztelendő program, alkalmazás:

SZFM_Fact_Portal

### Tesztelési környezet:
Google Chrome, Firefox, Microsoft Edge

### Tesztelés tárgya:

Fejlesztői- és Elfogadási teszt

### Tesztelés célja:

Az esetleges rossz funkcionalitás megtalálása, javítása 

### Tesztesetek:

### Halász Dávid
#### Tesztelés Chrome böngészőben
- Teszt 1: Az administrator.php oldalon az összes cikkek listázásának vizsgálata:
</br>A cikkek listázása megfelelően működik. Az oldal alapesetben kilistázza az összes cikket.
Ha a legördülő listából kiválasztjuk az 'érdekes' vagy a 'vicces' kategóriát, akkor annak megfelelően szűri a cikkeket.</br>

- Teszt 2: users_article.php oldalon a felhasználók által beküldött cikkek listázásának vizsgálata:
</br>A felhasználók által beküldött cikkek listázása megfelelően működnek. Lehet szűrni összes, aktív vagy aktiválandó kategóriák szerint.</br>

- Teszt 3: az users_article.php oldalon a hivatkozások vizsgálata:
</br>Elvárás, hogy a cikkre lá lehessen kattintani, és átirányítson egy másik oldalra. 
Ez az elvárás teljesül és átirányít az edit_article.php oldalra, ahol a cikk szerkesztő mezőben megjelenik a szerkesztendő cikk szövege.</br>

- Teszt 4: Az edit_article.php oldalon a cikk frissítésének vizsgálata (csak szöveg és kategória):
</br>Elvárás, hogy a cikkek szerkeszthetőek legyenek. A szöveg átírása és a kategória megválasztása után a frissítés megfelelően működik.</br>

- Teszt 5: Az edit_article.php oldalon a cikk frissítésének vizsgálata (kép hozzáadásával):
</br>Elvárás: cikk szerkesztése során csak jpeg/png képformátumú képet fogadjon el.
A szöveg, kategória és megfelelő képformátum (jpg/png) kiválasztása után a frissítés 
megfelelően működik. A képet eltárolja a mappában.</br>

- Teszt 6: Az edit_article.php oldalon a cikk frissítésének vizsgálata (kép hozzáadásával):
</br>Elvárás: cikk szerkesztése során csak jpeg/png képformátumú képet fogadjon el, 
ellenkező esetben hibaüzenetet dobjon ki. 
A szöveg, kategória és nem megfelelő képformátum kiválasztása után a program 
az elvárt módon működik: megjelenik egy "A képformátum nem megfelelő!" hibaüzenet 
és nem frissíti a cikket.</br>

- Teszt 7: Az edit_article.php oldalon a cikk törlésének vizsgálata:
</br>Elvárás, hogy törölni lehessen a cikket. A törlés gomb megnyomása 
után a cikk törlődik és visszairányít az users_articles.php 
oldalra, ahol már nem találjuk meg a törölt cikket. A funkció megfelelően működik</br>

- Teszt 8: Az edit_article.php oldalon a cikk aktiválásának vizsgálata:
</br>A aktiválás gomb megnyomása után a cikk aktiválódik. Már nem találhatjuk meg az
 aktiválandó cikkek között. Az elvárt módon működik a funkció.</br>

 - Teszt 9: Az admin_send_article.php oldalon a cikk beküldés vizsgálata:
</br>Elvárás, hogy üres mezőt ne lehessen beküldeni. 
Ez a funkció megfelelően működik. Az elvárt módon a program kiírja, hogy a mező kitöltése köelező.</br>

 - Teszt 10: Az admin_send_article.php oldalon a cikk beküldés vizsgálata:
</br>A szöveg mező kitöltése és a kategória kiválasztása után a cikkbeküldésnek sikeresnek 
kell lennie. Ez a feltétel teljesül.</br>

 - Teszt 11: Az admin_send_article.php oldalon a cikk beküldés vizsgálata:
</br>Elvárás, hogy nem megfelelő képformátumot ne fogadjon el. 
A szöveg mező kitöltése és a kategória, továbbá egy <b>nem megfelelő képformátum</b> (pdf) 
kiválasztása után a cikkbeküldés sikertelen volt. Egy "A képformátum nem megfelelő!" 
hibaüzenetet kapunk.</br>

 - Teszt 12: Az admin_send_article.php oldalon a cikk beküldés vizsgálata:
</br>A szöveg mező kitöltése és a kategória, továbbá <b>egy megfelelő képformátum</b> 
kiválasztása után a cikkbeküldés sikeres volt.</br>

 - Teszt 13: Az add_admin.php oldalon egy admin hozzáadásának vizsgálata:
</br>Ezen az oldalon két táblának kell megjelennie: az egyiken az aktív adminok, a másikon 
pedig azok a regisztrált felhasználók, akiket adminná tehetünk. Azt tapasztalom,hogy a 
kilistázás megfelelően működik. Egy felhasználó az aktiválás gomb megnyomása után átkerül 
az aktív admin táblába. Tehát a program megfelelően működik.</br>

 - Teszt 14: A registered_users.php oldalon a regisztrált felhasználók listázása:
</br>Elvárás, hogy lássuk a regisztrált felhasználókat egy táblában. 
A táblában a várt módon listázza ki a regisztrált felhasználókat. Pontosan ugyanannyi 
felhasználó jelenik meg, amennyi az adatbázisban található.</br>

 - Teszt 15: A registered_users.php oldalon a regisztrált felhasználók törlése:
</br>A törlés gomb megfelelően működik: a regisztrált felhasználó törlődik az adatbázisból.</br>

- Teszt 16: A kilépés gomb tesztelése:
</br>A kilépés gomb az elvárt módon működik: az admint a kilépés után visszairányítja az 
admin bejelentkező felületre.</br>

- Teszt 17: Az oldalak láthatóságának tesztelése Chrome böngészőben:
</br>Elvárás, hogy jogosulatlanok ne férhessenek hozzá az admin számára elérhető funkciókhoz. 
Ez a feltétel teljesül, mert ha az admin nincs bejelentkezve, akkor a csak admin számára 
elérhető oldalakat nem engedi megnézni. 
Ha megpróbáljuk, akkor a várt módon visszairányít az admin.php bejelentkező felülethez.</br>

#### Tesztelés Firefox böngészőben
- Teszt 18: Az oldalak láthatóságának tesztelése Firefox böngészőben:
</br>Elvárás, hogy jogosulatlanok ne férhessenek hozzá az admin számára elérhető funkciókhoz. 
Ez a feltétel teljesül, mert ha az admin nincs bejelentkezve, akkor a csak admin számára 
elérhető oldalakat nem engedi megnézni. 
Ha megpróbáljuk, akkor a várt módon visszairányít az admin.php bejelentkező felülethez.</br>

- Teszt 19: Az admin_send_article.php vizsgálata:
</br>Elvárás hogy cikket fel lehessen tölteni, amennyiben kitöltöttük a szövegmezőt és megfelelő képformátumú képet választottunk ki. Ez a feltétel teljesül, mert megjelenik a feltöltött cik az adatbázisban és az oldalon is.</br>

- Teszt 20: Az admin_send_article.php vizsgálata:
</br>Elvárás, hogy Firefox böngészőben is hibaüzenet jelenjen meg, ha nem megfelelően történik a cikkfeltöltés. Ez a feltétel teljesül, mert ha kitöltöttük a szövegmezőt és nem megfelelő képformátumú képet választottunk ki, akkor megjelenik Firefox böngészőben is a "A képformátum nem megfelelő!" hibaüzenet.</br>

### Kincs Ákos
#### Tesztelés Chrome böngészőben

- Teszt 1: Felhasználói regisztrációs oldal (reg.php) vizsgálata:
</br>Elvárás, hogy az adatbeviteli mezőkbe a gond nélkül lehessen gépelni, a jelszó megadását igénylő mezőkbe írt karaktersor
pedig ne legyen látható. Ez a feltétel teljesül, az összes mezőbe írhatunk, a jelszavak nem láthatóak. </br>

- Teszt 2: Felhasználói regisztrációs oldalon (reg.php) található hivatkozások vizsgálata:
</br>Elvárás, hogy az oldal alján megjelenő hivatkozásra kattintva a megfelelő oldalra jussunk. 
Az elvásárunknak eleget tesz, a vizsgált szövegre történő kattintás után a megfelelő, bejelentkezési oldalra navigálunk.</br>

- Teszt 3: Felhasználói bejelentkezési oldal (login.php) vizsgálata:
</br>Az elvárásunk az, hogy az adatbeviteli mezőkbe a gond nélkül lehessen gépelni, a jelszó megadását igénylő mezőkbe írt karaktersor
pedig ne legyen látható. Teszt után megállapítható, hogy ez az elvárás teljesül, az összes mezőbe írhatunk, 
a jelszavak pedig ténylegesen nem láthatóak. </br>

- Teszt 4: Felhasználói bejelentkezési oldalon (login.php) található hivatkozások vizsgálata:
</br> Elvárás, hogy az oldal alján megjelenő hivatkozásra kattintva a megfelelő oldalra jussunk. 
Az elvásárunknak eleget tesz, a vizsgált szövegre történő kattintás után a megfelelő, regisztrációs oldalra jutunk.</br>

- Teszt 5: E-mail cím helyességének vizsgálata a regisztrációs oldalon (reg.php):
</br>Elvárás lenne, hogy ha a regisztrációs folyamat során megadott e-mail cím nem megfelelő formátuma esetén, illetve ha az adott
 e-mail címmel már regisztáltak, az oldal interaktívan jelezzen vissza. Ez oldal az elvárt módon működik, a felhasználót 
 egyértelműen tájékoztatja mindkét esetleges a problémáról.</br>

- Teszt 6: Felhasználónév vizsgálata a regisztrációs oldalon (reg.php):
</br>Elvárás lenne, hogy két ugyanolyan nevű felhasználó ne regisztálhasson az oldalon. Ennek a feltételnek is megfelel az oldal,
a felhasználó hibát kap ha az általa választott névvel regisztráltak előtte.</br>

- Teszt 7: Jelszavakkal kapcsolatos elvárások vizsgálata a regisztrációs oldalon (reg.php):
</br>Elvárás, hogy hibaüzenetet kapjunk a regisztráció során meg nem adott jelszó esetén, illetve akkor is, ha a jelszó ismételt
megadásakor más jelszót ad meg a felhasználó. Mindkét feltétel teljesül, mindkét esetben megfelelő hibaüzenet jelenik meg
az oldalon.</br>

- Teszt 8: Sikeres regisztráció vizsgálata (reg.php):
</br>Az elvárás, hogy a megfelelő adatokkal történő regisztrációs űrlap után sikeres legyen a regisztráció, majd ezt követően 
be lehessen jelentkezni. Az oldal az elvárásoknak megfelelően funkcionál, egy bezárható előugró ablakban kapunk erről
visszajelzést.</br>

- Teszt 9: Felhasználónév vizsgálata a felhasználói bejelentkezésnél (login.php):
</br>Ha felhasználónevünket hiányosan adjuk meg, visszajelzést kapunk az oldaltól, hogy szükséges lenne pótolni azt.</br>

- Teszt 10: Jelszó vizsgálata a felhasználói bejelentkezésnél (login.php):
</br>Ha jelszavunkat hiányosan adjuk meg, visszajelzést kapunk az oldaltól, hogy szükséges lenne pótolni azt.</br>

- Teszt 11: Felhasználói kijelentkezés vizsgálata (user_article.php):
</br>A várt funkcionalitás, hogy a kiléps gombra kattintva a felhasználó visszajusson a bejelentkezési oldalra. 
A gomb megfelelően működik, kattintása utána a felhasználói bejelentkezési képernyőre jut.</br>

- Teszt 12: Felhasználónév vizsgálata az admin bejelentkezési oldalon (admin.php):
</br>A felhasználói bejelentkezéshez hasolóan, itt is elvárás, hogy hiányosan megadott bejelentkezési adatok esetén
hibaüzenet jelenjen meg. Ez az elvárás megvalósul, a megfelelő hiányos adat megadására hívja fel a figyelmet az oldal. </br>

- Teszt 13: Jelszó vizsgálata az admin bejelentkezési oldalon (admin.php):
</br>A felhasználói bejelentkezéshez hasolóan, itt is elvárás, hogy hiányosan megadott bejelentkezési adatok esetén
hibaüzenet jelenjen meg. Ez az elvárás megvalósul, a megfelelő hiányos adat megadására hívja fel a figyelmet az oldal. </br>

- Teszt 14: Admin bejelentkezés vizsgálata (admin.php):
</br>Elvárás lenne, hogy az adminisztrátori funkciókhoz csak az adminok férhessenek hozzá. Az elvárás teljesül, az adatbázisban
adminként nem szereplő felhasználókat nem engedi így bejelentkezni.</br>

- Teszt 15: Admin főoldal vizsgálata (administrator.php):
</br>A főoldaltól elvárjuk, hogy a hivatkozások megfelelően kattinthatók illetve az elvárt oldalra irányítanak át.
A tesztelést követően a hivatkozások megfelelő működéséről is megbizonyosodtunk, teljesül az elvárás.</br>

- Teszt 16: Admin kilépés (administrator.php):
</br>A logikus és elvárt funkcionalitása az Admin kilépés gombnak az lenne, hogy az admint visszairányítsa a bejelentkezési felületre.
A gomb eleget téve ennek, megfelelően működik.</br>

#### Tesztelés Firefox böngészőben

- Teszt 17: Általános teszt:
</br>A hivatkozások mindenhol megfelelőek, a bejelentkezés és a regisztráció működik.</br>

- Teszt 18: Visszajelzések tesztje:
</br>A nem megfelelő regisztrációs - és bejelentkezési adatokról történő tájékoztatás megfelelően működik.</br>

#### Tesztelés Edge böngészőben

- Teszt 19: Általános teszt:
</br>A hivatkozások mindenhol megfelelőek, a bejelentkezés és a regisztráció működik.</br>

- Teszt 20: Visszajelzések tesztje:
</br>A nem megfelelő regisztrációs - és bejelentkezési adatokról történő tájékoztatás megfelelően működik.</br>