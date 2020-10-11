# Funkcionális Specifikáció

## 1. A rendszer céljai és nem céljai. 
### Célok:
#### A fő célja az oldalnak, hogy random tényeket tárjon a nagyvilágból a fellhasználó elé.
- Reszponzív weboldal 
- Felhasználó regisztráció
- Felhasználói felület
- Több kategória közötti választás 
- Előre gomb mely egy különböző cikket mutat az adott oldalhoz képest
- Vissza gomb mely az előző cikket tölti be újra
- Like és dislike gomb minden egyes cikk alatt
- Rangsor láthatósága a like és dislike funkcióból
- Felhasználó által cikk beküldés (Amit, hogy megjelenjen az oldalon, egy adminnak el kell fogadnia)
- Admin felület (Cikk áttekintés, cikk elfogadás(felhasználók által beküldött), cikk feltöltés)


### Nem célok:
- Hírlevél feliratkozás lehetősége
- Animációk és videók elhelyezése az oldalon
- Reklámok elhelyezése az oldalon
- Egyazon cikket kétszer egymás után mutasson
- Kommentek engedélyezés
- Helytelen, rasszista, pornográf cikkek feltöltése

## 2. Jelenlegi helyzet leírása.
A [követelményspecifikációban](https://github.com/gilaattila95/SZFM_2020_10_Pointers_BigProject/blob/master/requirement_specification.md) 
részletezésre került

## 3. Vágyálom rendszer leírása.
A [követelményspecifikációban](https://github.com/gilaattila95/SZFM_2020_10_Pointers_BigProject/blob/master/requirement_specification.md) 
részletezésre került

## 4. Jelenlegi üzleti folyamatok modellje.
A [követelményspecifikációban](https://github.com/gilaattila95/SZFM_2020_10_Pointers_BigProject/blob/master/requirement_specification.md) 
részletezésre került

## 5. Igényelt üzleti folyamatok modellje.
A [követelményspecifikációban](https://github.com/gilaattila95/SZFM_2020_10_Pointers_BigProject/blob/master/requirement_specification.md) 
részletezésre került

## 6. Követelménylista.
A [követelményspecifikációban](https://github.com/gilaattila95/SZFM_2020_10_Pointers_BigProject/blob/master/requirement_specification.md) 
részletezésre került

## 7. Használati esetek.
A projektünkben két aktor szerepel: A weboldalt látogató felhasználók, akik akár regisztrálhatnak is a weboldalra és az adminisztrátorok.<br>
Az elsődleges szereplők, azaz a vállalat munkatársai gép előtt ülő munkát végeznek. Rendelkeznek legalább felhasználói szintű számítógépes ismeretekkel, de elvárás, hogy a weboldal kezelőfelülete ne legyen bonyolult.<br>
Ha a weboldalt látogató munkatárs úgy dönt, hogy szeretne cikkeket beküldeni, akkor regisztrálhat a weboldalra, ezáltal lehetősége lesz cikkek beküldésére, és a saját cikkük szerkesztésére és/vagy törlésére.<br>
Van még egy fontos szereplő is: a weboldalt üzemeltető adminisztrátorok. Akik szintén írhatnak cikkeket, továbbá bármilyen cikket szerkeszthetnek és törölhetnek, akár olyat is, amit nem ő maguk írtak. Fontos még, hogy az adminisztrátor képes legyen egy regisztrált felhasználót adminisztrátorrá tenni pár gombnyomással.<br>
Mind a regisztrált felhasználó és adminisztrátor általi cikk beküldés és törlés után azonnali visszajelzést kapjon az adminisztrátor, ha valami miatt nem sikerült az adatok eltárolása (pl.: kitöltetlen mező, nem megfelelő képformátum) vagy ellenkezőleg, azaz sikeres volt a folyamat végrehajtása.<br>
<p align="center">Use Cases</p>
<img src="https://github.com/gilaattila95/SZFM_2020_10_Pointers_BigProject/blob/main/docs/images/use_cases.png">

## 8. Megfeleltetés, hogyan fedik le a használati esetek a követelményeket.

<b>Eset 1: Főképernyő látogatása</b>

- A weboldal címének beírása után megjelenő főoldal megjelenítése.
- Alapértelmezettként az Érdekes tényekkel kapcsolatos cikkek vannak beállítva, így először ez lesz látható.
- A főoldalon látható elemek: Érdekes- és vicces tényeket megjelenítő gombok, regisztrációs gomb, belépő gomb, admin belépő gomb.

<b>Eset 2: Érdekes gomb</b>

- A felhasználó erre kattintva az érdekes tények csoportjába tartozó cikkek listáját jelenítheti meg.
- Alapértelmezettként az Érdekes tényekkel kapcsolatos cikkek vannak beállítva, így először ez lesz látható.

<b>Eset 3: Vicces gomb</b>

- A felhasználó erre kattintva a vicces tények csoportjába tartozó cikkek listáját jelenítheti meg.

<b>Eset 4: Regisztráció</b>

- A felhasználó erre kattintva a rendszer átirányítja a regisztrációs felületre.
- Sikeres regisztráció után a felhasználói felületre kerül.

<b>Eset 5: Belépés</b>

- Regisztrált felhasználói űrlap megjelenítése.
- Beküldés után az űrlap adatainak ellenőrzése.
- Láthatóvá válik a regisztrált felhasználó számára a következők: új cikk hozzáadása, beküldött cikkek szerkesztése és törlése.
- Csak saját cikkeket lehet törölni és vagy szerkeszteni.

<b>Eset 6: Rangsor</b>

- Ezen az oldalon az egyes cikkek rangsorolva jelennek meg a like-ok száma alapján.

<b>Eset 6: Adminisztrátor bejelentkező</b>

- Admin bejelentkezési űrlap megjelenítése.
- Beküldés után az űrlap adatainak ellenőrzése.
- Az adatok helyes megadása után, átirányítás a cikkfeltöltő oldalra.

<b>Eset 7: Cikkek feltöltése</b>

- Cikkfeltöltő űrlap megjelenítése.
- Űrlap adatainak tárolása.
- Az űrlap adatainak ellenőrzése (hiányzó elemek, helyes képformátumok használata).

<b>Eset 8: Cikkek törlése</b>

- Egy választott cikk törlése.

<b>Eset 9: Cikkek szerkesztése</b>

- Egy választott cikk szerkesztése.
- Beküldés előtt a mezők ellenőrzése, hogy megfelelően vannak-e kitöltve.

<b>Eset 10: Adminisztrátor hozzáadása</b>

- Az adminisztrátor egy regisztrált felhasználót adminisztrátorrá tehet.


## 9. Képernyő tervek.

## 10. Forgatókönyvek.

## 11. Funkció – követelmény megfeleltetés.

<b>Követelményspecifikáció - K01: </b>

A követelményspecifikációban követelményként megadott reszponzív design feltétele teljesülni fog, ugyanis a front-end
Bootstrap keretrendszerrel kerül majd megvalósításra.

<b>Követelményspecifikáció - K02: </b>

A letisztult, egyszerű felület evidens, manapság a modern weblapoknál ez alapelvárás.
Ezzel teljes mértékben tisztában is vagyunk, természetesen törekedni fogunk ezen követelmény
kielégítésére. A képernyő terveken látható is az erre irányuló törekvés.

<b>Követelményspecifikáció - K03: </b>

Egy egyszerű és könnyen kezelhető, gyakorlatilag eltéveszthetetlen regisztrációs felület kerül majd létrehozásra a 
munkatársak számára. Csak az alapadatok megadására (mint többek között a felhasználónévre) lesz szükség majd.

<b>Követelményspecifikáció - K04: </b>

A regisztrált munkatársak belépésére szolgáló, egyértelmű felület is el fog készülni.

<b>Követelményspecifikáció - K05: </b>

Fontosnak tartjuk, hogy a dolgozók által beküldött cikkek esetében a beküldő személye minden esetben látható legyen. 
A regisztációkor megadott nickname kerül majd ilyenkor megjelenítésre.

<b>Követelményspecifikáció - K06: </b>

Fontosnak tartjuk a cikkek rangsorolását, hogy látható legyen, mik az aktuális népszerű cikkek. Ezért kategóriánként 
a rangsorolást is véghez fogjuk vinni.

<b>Követelményspecifikáció - K07: </b>

Jelen dokumentum több pontos is részletezi az adminisztrátori belépőfelületet, képernyőterveken is megfigyelhető.
A végleges weboldalon is helyet fog kapni. Szintén egyértelmű lesz, felépítésében hasonlítani fog a munkatársak számára 
szolgáló belépőfelületre.

<b>Követelményspecifikáció - K08: </b>

A cikkek MySQL-ben történő tárolása lehetőséget ad majd azok könnyű manipulálására, kezelésére. Ebből következik, hogy az adatbázisba történő új cikkek hozzáadása a mai napig egyik legnépszerűbb adatbázis-kezelővel, a MySQL-lel könnyen kivitelezhető lesz majd.

<b>Követelményspecifikáció - K09: </b>

Alapkövetelménynek tartjuk, hogy a felkerült cikkek módosíthatók, igény szerint törölhetők legyenek az oldalról és az 
adatbázisból egyaránt. Weboldalunk ezt a szempontot figyelembe véve készül majd.

<b>Követelményspecifikáció - K10: </b>

Az adminisztrátor számára elérhető funkciók rejtve maradnak majd az admin funkciókkal nem rendelkező felhasználók
számára. Ugyanakkor a weboldalon lesz egy opció, miszerint egy adminisztrátornak minden egyes regisztrált felhasználó 
esetében lehetősége lesz azt szintén adminisztrátorrá tenni.

<b>Követelményspecifikáció - K11: </b>

A megfelelő gombra kattintás után a cikkek téma szerinti listázása is megvalósításra kerül.

<b>Követelményspecifikáció - K12: </b>

A weblapunk a követelményspecifikációkban meghatározott technológiákkal megvalósítva a böngészőfüggetlenségi 
követelménynek is maradéktalanul eleget tesz majd, ugyanúgy fog megjelenni az összes asztali böngészőben egyaránt.

<b>Követelményspecifikáció - K13: </b>

A modern alkalmazások és weboldalak kihagyhatatlan, nem mellesleg szemkímélő elemét, a Dark mode-ot a kezdetektől fogva
elérhetővé tesszük a felhasználók számára.

## 12. Fogalomszótár.

- [MySQL](https://en.wikipedia.org/wiki/MySQL)
- [HTML](https://hu.wikipedia.org/wiki/HTML)
- [CSS](https://hu.wikipedia.org/wiki/Cascading_Style_Sheets)
- [PHP]( https://en.wikipedia.org/wiki/PHP)
- [Reszponzív design](https://en.wikipedia.org/wiki/Responsive_web_design)
- [Front-end](https://en.wikipedia.org/wiki/Front-end_web_development)
- [Boostrap](https://en.wikipedia.org/wiki/Bootstrap_(front-end_framework))
- [Böngészőfüggetlenség](https://en.wikipedia.org/wiki/Cross-browser_compatibility)
- [Dark mode]( https://en.wikipedia.org/wiki/Light-on-dark_color_scheme)