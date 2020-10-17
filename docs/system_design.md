# A rendszer célja

- Az oldal látogatóinak:
    - Egy olyan weblap elérése, amely nevéhez hűen érdekesebbnél érdekesebb tényekkel igyekszik megfogni látogatóit
    - Reszponzív weboldal, hogy a felhasználók minden felületen használhassák
    - Könnyen megszokható, tanulást nem igénylő felhasználói felület biztosítása
    - Felhasználó regisztráció
    - Alapvetően érdekes cikkek olvasása
    - Több kategória közötti választás
    - Like és dislike gomb minden egyes cikk alatt
    - A véleményekből rangsor
    - Saját cikk beküldésére egy gomb (Amit, hogy megjelenjen az oldalon, egy adminnak el kell fogadnia)
    - Előre gomb mely egy különböző cikket mutat az adott oldalhoz képest
    - Vissza gomb mely az előző cikket tölti be újra

- Adminoknak:
    - Felhasználok kezelése (törlés, tiltás, felszólítás)
    - Cikkek kezelése (beküldés, törlés, elfogadás, rendezés)
    
## A rendszernek nem célja:

- Hírlevél feliratkozás lehetősége
- Animációk és videók elhelyezése az oldalon
- Reklámok elhelyezése az oldalon
- Egyazon cikket kétszer egymás után mutasson
- Kommentek engedélyezés
- Helytelen, rasszista, pornográf cikkek feltöltése

# Projekt terv  

# Üzleti folyamatok modellje

A felhasználó a weblapot megnyitva egy egyszerű, könnyen átlátható főképernyőn találja magát, 
ahol alapértelmezetten az érdekes tényeket tartalmazó cikkek jönnek majd vele szembe.
Innen a fenti menüsorból navigálhat tovább a felhasználó. A menüsor tartalma:

- 'Érdekességek' gomb: A gombra kattintva eljuthatunk az érdekes cikkek listájához. A főképernyőről ezen menüpontra kattintva nem érzékelünk 
újdonságot, hiszen alapértelmezés szerint is ezeket a cikkeket látjuk.

- 'Viccesek' gomb: A gombra kattintva a felhasználó eljut a vicces cikkek listájához.

- 'Cikk beküldése' gomb: A felhasználónak lehetőséged ad saját cikkek beküldésére.
Az oldalon való megjelenést viszont adminisztrátori jóváhagyás előz meg.

- 'Regisztráció' gomb: A  felhasználót a regisztrációs felületre irányítja ahol lehetősége van fiók létrehozására.

- 'Belépés' gomb: Rákattintva a felhasználói bejelentkezési képernyőre jutunk ahol a felhasználók az előzőleg, 
regisztráció során megadott adatainak (felhasználónév és jelszó) megfelelő kombinációjával léphet be.

- 'Admin belépés' gomb: Az adminisztrátori bejelentkező űrlapra viszi a felhasználót. Hibás bejelentkezési adatok esetén
    meghiúsul a belépés.
    - Cikk beküldése: Egy szövegmező áll rendelkezésre, ahová a cikk szövege írható. Lehetőség van kiválasztani egy legördülő
     listából, hogy melyik kategóriába szeretnénk feltölteni cikkünket, amelyet igény szerint akár képpel együtt is
     feltölthetünk.

- 'Rangsor' gomb: Kattintás után megjelennek a cikkek az erre szolgáló felületen, a felhasználók által leglájkoltabb 
cikkek kerülnek a rangsor elejére. 

- 'Dark mode' gomb: A gombra kattintva az oldal színvilága megváltozik, a szemnek hosszútávon kellemesebb 'sötét módban' 
kerül megjelenítésre az oldal. Újabb kattintást követően visszakapjuk eredeti színvilágunkat.

- Like és dislike gomb: Lenyomásuk száma tárolásra kerül, egyfajta visszajelzésként szolgál a cikk népszerűségéről.

- 'Vissza' és 'következő' gombok: Adott kategórián belüli cikkek közötti navigálást teszi lehetővé. Kategórián belüli új, 
véletlenszerű cikk megjelenítését és az előzőleg látott cikk újramegtekintését teszik lehetővé.

# Követelmények

# Funkcionális terv

Weboldalunkat tervezése során törekedtünk arra, hogy a cég minden dolgozója egyből magáénak érezze azzal, hogy használata
kezdetétől fogva könnyen átlátható, egyszerű felhasználói felülettel találja szemben magát. A dolgozóknak az oldal olvasásához bejelentkezésre vagy regisztrációra nincs szükségük, viszont a cikkek feltöltéséhez elengedhetetlen a regisztáció.

Az oldal meglátogatásakor egy üdvözlő üzenet jelenik meg a cégtől.

Az oldal tetején lévő menüsorból az oldal összes funkciója elérhető, beleértve:

- tények olvasása kategória szerint
- rangsor véleménynyilvánítás alapján kategória szerint
- felhasználó regisztráció
- felhasználó és admin bejelentkezés
- felhasználó bejelentkezés után:
    - saját cikk beküldése: beküldés után az admin manuálisan felülvizsgálja a cikk tartalmát, ha megfelelőnek tartja, az csak akkor kerül ki az oldalra
    - saját beküldött cikkek megtekintése
- admin bejelentkezés után:
  - összes cikk megtekintése
  - felhasználók által beküldött cikkek elfogadása vagy elutasítása
  - cikkek feltöltése, szerkesztése, törlése

## Képernyő tervek:

- Az összes menüpont képernyőterve, beleértve a cikk beküldésére szolgáló oldalt, az admin-bejelentkező oldalt, illetve
a cikkek like-olását illetve dislike-olását lehetővé tevő funkcionalitást.

<!--
<img src="https://github.com/gilaattila95/SZFM_2020_10_Pointers_BigProject/blob/master/images/Kepernyoterv%201.png" width="50%" height="50%">
-->
## Menü hierarchiák:
- A menüpontokon belül nincsen különösebb hierarchia, az összes menüpontból egytől egyig elérhető az összes többi másik is.
Az admin bejelentkezés után további menüpontok mindegyike szinten elérhető.

# Fizikai környezet
# Absztrakt domain modell

# Architekturális terv

# Adatbázis terv

- Logikai adatmodell
<img src="https://github.com/gilaattila95/SZFM_2020_10_Pointers_BigProject/blob/master/images/fact_db.png" width="50%" height="50%">

- Tárolt eljárások

A cikkekkel kapcsolatos adatok tárolására jelenleg a phpMyAdmin nyílt forráskódú eszközt használjuk. A képek feltöltése során a jpg vagy png formátumú fájlokat a projekt saját images mappájába fogjuk átmásolni.

- Fizikai adatmodellt legeneráló SQL szkript

~~~~sql
CREATE TABLE `admin_userek` (
  `auid` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `jelszo` char(255) COLLATE utf8_hungarian_ci NOT NULL,
  `uname` varchar(60) COLLATE utf8_hungarian_ci NOT NULL,
  `aktiv` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

CREATE TABLE `cég_userek` (
  `cuid` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf8_hungarian_ci NOT NULL,
  `jelszo` char(255) COLLATE utf8_hungarian_ci NOT NULL,
  `uname` varchar(60) COLLATE utf8_hungarian_ci NOT NULL,
  `aktiv` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

CREATE TABLE `cikkek` (
  `cid` int(11) NOT NULL,
  `ctext` text COLLATE utf8_hungarian_ci NOT NULL,
  `kep` varchar(60) COLLATE utf8_hungarian_ci DEFAULT NULL,
  `asent` int(11) NOT NULL,
  `aktiv` int(11) NOT NULL,
  `kategoria` varchar(60) COLLATE utf8_hungarian_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

CREATE TABLE `likes_number` (
  `lnid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `likes` int(11) DEFAULT '1',
  `dislikes` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_hungarian_ci;

~~~~

# Implementációs terv

# Tesztterv

# Telepítési terv

# Karbantartási terv

Mivel mind jól tudjuk, hogy az informatika egy folyamatosan megújuló iparág, fontosnak tartjuk, hogy naprakészek maradjunk az aktuális szabványokkal, technológiákkal kapcsolatban. Ebből adódóan kötelességünknek érezzük, hogy weblapunkat átadás után is
karbantartsuk, illetve korszerűsítsük azzal, hogy mindig naprakész technológiákat használunk.

A tartalomra vonatkozóan pedig mindkét kategóriájú cikkek rendszeres frissítését tervezzük, így az adatbázisban nem lesznek
megtalálhatók több hetes, a felhasználók által már megunt cikkek.
