# Funkció specifikáció 

## Jelenlegi folyamat leírása 
Csapatunk egy filmértékelő weboldal létrehozását tervezi, amely lehetőséget biztosít a felhasználóknak, hogy megosszák véleményüket a látott filmekről. A platform célja, hogy a felhasználók ne csupán pontszámokkal, 
hanem kommentjeikkel is kifejezhetik véleményüket. Ezek mellett tudják kedvencek-be sorolni, illetve pipával jelezhetik ha már látták az adott filmet. 
Az oldal egyedi jellegét az adja, hogy nem egy hagyományos filmadatbázis, hanem egy modern,weboldalként működő közösségi felület, ahol a felhasználók könnyedén böngészhetnek, értékelhetnek és mások véleményére is reagálhatnak.
 
## Vágyalomrendszer leírása
Olyan webalkalmazás létrehozása a célunk, amely PC-n és laptopon minden felhasználó számára könnyen elérhető. Fontos, hogy az alkalmazás bármilyen operációs rendszeren elérhető legyen, ezért a Laravel keretrendszerben való fejlesztést választottuk.
A frontend megvalósításához JavaScript, HTML és CSS használata szükséges, így a felület dinamikus és reszponzív lesz. A backend PHP nyelven készül, amely a Laravel keretrendszer stabilitását és könnyű karbantarthatóságát biztosítja. Az adatbázis kezelésére SQL nyelvet használunk, ami precíz és megbízható működést tesz lehetővé. Célunk, hogy a kód tiszta és jól strukturált legyen, így később új fejlesztők is könnyen tudnak csatlakozni a projekthez. Az alkalmazásban a felhasználók jogosultságai elkülönítettek: két fő rangot különböztetünk meg, Admin és Felhasználó, hogy a rendszer biztonságos maradjon, és ne lehessen jogosulatlanul módosítani vagy törölni tartalmakat. Az adatbázis séma tekintetében fontos, hogy a különböző egyedeket külön táblákban tároljuk, és a rendszer a későbbiekben könnyen bővíthető, skálázható legyen. A portál kinézetére vonatkozó terveket a Képernyőtervek pont alatt részleteztük. Ezek ötvözésével egy modern, skálázható webalkalmazás készül, amely megfelel minden alapvető követelménynek, egyszerűen kezelhető és továbbfejleszthető.

## Jelenlegi üzleti folyamatok modellje

A mai világban a hagyományos filmértékelő oldalak sokszor nem képesek lépést tartani a változó filmes igényekkel és a modern közönség elvárásaival. Ezek az oldalak gyakran csak alapvető pontszámokat vagy rövid kritikákat kínálnak, amelyek kevéssé segítik a felhasználót abban, hogy valóban átfogó képet kapjon a filmekről. Bár egyesek nosztalgiából még élvezik ezeket az értékeléseket, azok, akik részletesebb, személyre szabott információkat keresnek, gyakran hosszú időt töltenek a megfelelő tartalmak felkutatásával. A régi portálok nem mindig tudják tükrözni a modern filmes trendeket és a felhasználók változó igényeit, így egyre nagyobb az igény olyan platformokra, amelyek friss, releváns és átfogó értékelésekkel segítik a felhasználókat a döntésben. Mi egy olyan webalkalmazást hozunk létre, amely kifejezetten a PC- és laptophasználó közönség számára nyújt könnyen elérhető, interaktív filmértékelő élményt, ahol mindenki megoszthatja saját véleményét, és inspiráló módon böngészhet mások értékelései között.

## Igényelt üzleti folyamatok modellje

A platformon a felhasználók értékelhetik a filmeket pontszámokkal, így könnyedén kiemelhetik a számukra legkedvesebb alkotásokat. Az értékelési rendszer biztosítja, hogy a legnépszerűbb filmek a lista élén jelenjenek meg, így a látogatók gyorsan megtalálhatják a közönség által legjobbnak ítélt filmeket. A regisztrált felhasználók testreszabhatják saját profiljukat, például módosíthatják nevüket és profilképüket. A rendszer két fő rangot különböztet meg – Admin és Felhasználó –, amelyek eltérő hozzáférési szinteket biztosítanak az oldal funkcióihoz és tartalmaihoz, így a biztonságos és rendezett működés garantált.

## Követelménylista

| Id  | Modul       | Név                     | Leírás |
|-----|------------|------------------------|--------|
| k1  | Felület    | Regisztráció            | A felhasználók ezen az oldalon tudnak saját fiókot létrehozni a rendszerben, így hozzáférnek a filmadatbázishoz. |
| k2  | Felület    | Bejelentkezés           | A felhasználók itt tudnak bejelentkezni, ha filmeket szeretnének megtekinteni, értékelni vagy kategorizálni igény szerint. |
| k3  | Felület    | Kategóriák              | A felhasználók a filmek kategóriáit választhatják ki, és ezen belül szűrhetnek. |
| k4  | Felület    | Filmek                  | Lehetőségük van megtekinteni a filmadatbázist, szűrhetnek év, értékelés, illetve cím szerint (A-Z, Z-A). |
| k5  | Felület    | Kommentelési lehetőség  | A felhasználók a filmekhez kapcsolódó kommentekben vitathatják meg véleményüket. |
| k6  | Felület    | Értékelési lehetőség    | Itt tudják értékelni kedvenc filmjeiket. |
| k7  | Felület    | Kedvencekhez adás       | Lehetőségük van kedvencekhez hozzáadni a megnézett filmeket. |
| k8  | Felület    | Megnézettként jelölés   | Lehetőségük van a már látott filmeket pipával jelölni. |
| k9  | Jogosultság| Jogosultsági szintek    | - **Admin**: filmek törlése, hozzáadása<br>- **Felhasználó**: tartalmak megtekintése, kommentelés, kedvencekhez adás, értékelés, megjelölés megtekintettként |

## Használati esetek
ADMIN: Feladata a rendszer felügyelete, karbantartása, tesztelése. Ebből következően minden szerepkörbe be tud lépni, hogy ellenőrizze azok hibamentes üzemelését. Joguk van kommentet törölni, vagy módosítani, hiszen feladatuk moderálni a portálon való tartalmakat.
FELHASZNÁLÓ: Jogában áll az oldalon megjelenő minden tartalom megtekintése, valamit ezekre adhat visszajelzéseket komment, és érétkelés formátumban. 

## Megfeleltetés, hogyan fedik le a használati eseteket a követelmények

## Alap forgatókönyv
Amikor a felhasználó megnyitja a weboldalt, a Kezdőlap jelenik meg, ahol látható az oldal címe és a Bejelentkezés és Regisztráció opciók érhetők el. 
A Regisztráció gombra kattintva egy panel nyílik, ahol a látogatók néhány alapadat megadásával hozhatják létre felhasználói fiókjukat. A Bejelentkezés opció kiválasztásakor a felhasználó a felhasználónevét és jelszavát adja meg. Hibás adat esetén a rendszer újra kéri a helyes bejelentkezési adatokat. Bejelentkezés után a bal oldalon a filmkategóriák találhatók, amelyek segítségével a látogatók böngészhetik a számukra érdekes műfajokat. Alapértelmezettként a legjobban értékelt filmek toplistája jelenik meg, a legmagasabb pontszámúaktól a legkevésbé értékeltig.
Felhasználói jogosultsággal rendelkező személy esetén a kezdőlap bővített lehetőségeket kínál: a felhasználók megtekinthetik a filmeket, hozzászólhatnak azokhoz, hozzáadhatják kedvenceikhez a számukra tetsző alkotásokat, értékelhetik a filmeket, illetve jelölhetik a már megtekintett tartalmakat.
Adminisztrátori jogosultsággal a felhasználó minden alapfunkcióhoz hozzáfér.

## Jogosultsági szintek lehetőségei

Felhasználói jogkörrel rendelkező felhasználók:
A bejelentkezett felhasználók minden, a megtekintők számára elérhető funkciót használhatnak, emellett:
Kommentelhetik a filmeket.
Értékelhetik az egyes tartalmakat.
Kedvencekhez adhatják a filmeket.
Megjelölhetik megtekintettként a már látott filmeket.
Profiljukat módosíthatják, beleértve a jelszóváltoztatást is.
Kijelentkezhetnek, és visszatérhetnek a megtekintői módba.

Adminisztrátori jogkör (fejlesztői jogosultság):
Ez a jogosultsági szint kizárólag a fejlesztőket érinti.
Hozzáférnek a rendszer teljes működéséhez.
Tesztelhetik, karbantarthatják és frissíthetik az oldalt.
Szükség esetén módosíthatják a felhasználói adatokat vagy törölhetnek hibás bejegyzéseket.
Feladatuk a rendszer biztonságos, hibamentes üzemeltetésének biztosítása.

## Funkció - követelmény megfeleltetése

K1 – Bejelentkezés nélküli interakciók elkerülése
A főoldalon az értékelési és kommentelési funkciók alapértelmezetten le vannak tiltva. Ezek a lehetőségek kizárólag a bejelentkezett felhasználók számára érhetők el, így a rendszer biztosítja, hogy csak regisztrált tagok vehessenek részt az interakciókban.

K2 – Tartalmak kategorizálása
A navigációs sávban található „Kategóriák” menüpont segítségével a felhasználók könnyedén kiválaszthatják, milyen típusú filmeket szeretnének megtekinteni. A kategóriák szűrési lehetőséget is biztosítanak, például műfaj, év vagy értékelés alapján.

K3 – Profil szerkesztése
A „Profil” menüpontra kattintva a felhasználók módosíthatják az általuk megadott adatokat, például jelszót vagy megjelenített nevet. Emellett megtekinthetik kedvenc filmjeiket, értékeléseiket és a megtekintettként jelölt tartalmakat is.

K4 – Filmértékelés és ajánlás küldése
A bejelentkezett felhasználók lehetőséget kapnak arra, hogy saját filmértékeléseket vagy ajánlásokat küldjenek be a főoldalon. Az új bejegyzések azonnal megjelennek a filmek között, így mások is olvashatják és értékelhetik azokat.

K5 – Toplista megjelenítése
A főoldalon a filmek egy toplistában jelennek meg, amely a legmagasabb értékelésű tartalmakat helyezi előre. A felhasználók személyre szabott szűrőkkel rendezhetik a listát, például kategória, év vagy pontszám alapján.

K6 – Admin felület
Az admin (fejlesztői jogosultságú) felhasználók számára egy külön menüpont válik elérhetővé, amelyben karbantarthatják a rendszert, javíthatják a hibákat, és módosíthatják a felhasználói adatokat. Ez a funkció kizárólag a fejlesztés és tesztelés céljait szolgálja.

K7 – Bejelentkezési és regisztrációs felület
A bejelentkezési oldalon a felhasználók megadhatják bejelentkezési adataikat, vagy új fiókot hozhatnak létre. A sikeres bejelentkezést követően minden interaktív funkció (értékelés, kommentelés, kedvencekhez adás) elérhetővé válik számukra.

K8 – Elfelejtett jelszó
Amennyiben a felhasználó elfelejti jelszavát, a bejelentkezési oldalon kérhet újat, amelyet e-mailben vagy a rendszer által biztosított felületen keresztül állíthat be.

K9 – Jogosultsági szintek
A rendszer két jogosultsági szintet különböztet meg:

Felhasználó: megtekintheti a filmeket, értékelhet, kommentelhet, kedvencekhez adhat és megjelölheti a filmeket megtekintettként.

Admin (fejlesztő): hozzáfér a rendszer teljes funkcionalitásához, karbantartást végezhet, hibát javíthat és kezelheti a felhasználói adatokat.

## Fogalomszótár
ADMIN (adminisztrátor) Oldal kezelője, lehetősége van kommentek törlésére.
USER (felhasználó) Oldal fiókkal rendelkező felhasználója.
