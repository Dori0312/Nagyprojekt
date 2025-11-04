# Rendszerterv
# GreenScreen Videó Értékelő Oldal
## Nagyprojekt

## A rendszer célja
Egy adatbázissal rendelkező film értékelő oldal, ahol a látogatók meg tudják
tekinteni kedvenc filmük leírását és mások értékelését. Regisztrált felhasználók
már tudnak értékelni és kommentelni a filmek alá.

## Projektterv

### Projektmunkások és felelőségek:
* Frontend:
    + Filipcsei István Koppány
* Feladatuk:
    + A felhasználók által elérhető felületek létrehozása. 
    + Oldal felépítés
    + Egységes, letisztul, felhasználóbarát grafikus design megalkotása
* Backend:
    + Filipcsei István Koppány
    + 
    +
* Feladatuk: 
    + A frontend kiszolgálása adatokkal.
    + Adatbázisok létrehozása, implementálás
    + Adatbázist kezelő logika megírása (php)
* Tesztelés:
    + Filipcsei István Koppány
    + 
    + 
* Feladatuk: Hibák feltárása az üzembe helyezés előtt.

## Üzleti folyamatok modellje

* Adminisztrátor
    + Bejelentkezés
    + Kommentek olvasása
    + Kommentek létrehozása
    + Kommentek törlése
    + Filmek értékelése
    + Filmek hozzáadása az adatbázishoz
    + Filmek törlése az adatbázisból
    + Film oldalak megtekintése
    + Felhasználók kezelése az adatbázisban
* Felhasználó
    + Bejelentkezés
    + Kommentek olvasása
    + Kommentek létrehozása
    + Saját kommentek törlése
    + Filmek értékelése
    + Film oldalak megtekintése
* Látogató
    + Regisztráció
    + Kommentek olvasása
    + Film oldalak megtekintése

## Követelmények

### Funkcionális követelmények

+ Kommentek tárolása (Csakis szöveget kezel)
+ Felhasználók adatainak tárolása (felhasználónév, jelszó, email)
+ Bejelentkezett felhasználó képes filmet értékelni, mely az adatbázisban kerül eltárolásra
+ A webes felület gördülékenyen kommunikál a hozzárendelt adatbázissal
+ A webes felületen kezel adatbázist (Film Hozzáadása, Kommentelés, Törlés funkciók)

### Nem funkcionális követelmények

- Nem regisztrált látogató esetén, nem jeleníti meg a számára elérhetetlen funkciókat (bizonyos gombok elrejtése, pl.: Kommentelés)
- Nem adminisztrátor látogató esetén, nem jeleníti meg a számára elérhetetlen funkciókat (bizonyos gombok elrejtése, pl.: Film Hozzáadása)
- Használatához telepítés nem szükséges

## Funkcionális terv

### 5.1 Rendszerszereplők

+ **ADMIN**
    - a rendszer felügyelete az elsődleges feladata, hozzáfér mindenhez, kezelni tudja az összes oldalon és adatbázisban megjelenő adatot

+ **FELHASZNÁLÓ**
    - különböző filmek alá kommentelhet és értékelhet

+ **LÁTOGATÓ**
    - az oldalon megjelenő filmeket és a felhasználók kommentjeit tekintheti meg
    - filmet nem értékelhet csak ha rendelkezik profillal

## Fizikai környezet
- Az alkalmazás asztali platformra készült, amely elérhető bármilyen PC-ről,
internet hozzáférés mellett.
- Semmilyen egyéb alkalmazás telepítése nem szükséges az alkalmazás futtatásához.

## Architekturális terv
### Backend szerver
- A webszerver XAMPP Apache disztribúcióval megy
- VSCODE php és sql
### Frontend kliens
- VSCODE html, css

## Adatbázis terv

* TABLE - USER
    + STRING - USERNAME (PRIMARY_KEY)
    + STRING - PASSWORD
    + BOOL - ADMIN (FALSE ~ USER; TRUE ~ ADMIN)

* TABLE - JOKES
    + NUMBER - ID (PRIMARY_KEY, AUTO_INCREMENT)
    + STRING - AUTHOR (FOREIGN_KEY(USER-USERNAME))
    + STRING - CONTENT (UNIQUE)

* TABLE - VOTES
    + STRING - USER (FOREIGN_KEY(USER-USERNAME))
    + NUMBER - JOKE (FOREIGN_KEY(JOKES-ID))
    + INT - VOTE (-1 ~ DOWN; 0 ~ INTACT; 1 ~ UP)

* TABLE - SAVED
    + STRING - USER (FOREIGN_KEY(USER-USERNAME))
    + NUMBER - JOKE (FOREIGN_KEY(JOKES-ID))

## Implementációs terv
### Backend
A webszerveren futú Rust alkalmazás és adatbázis tartalmazza az üzleti logikát,
ezzel végpontokon keresztül lehet HTTP protokollnak megfelelően REST 
architektúrának megfelelő kérésekkel komunnikálni, és állapotát módosítani.\
MariaDB relációs adatbázis-kezelő rendszer fut a szerveren az adatok tárolására,
kezelésére és karbantartására.
### Frontend
A felhasználói felület, amely asztali alkalmazásban megjelenő weboldal 
formájában érhető el, HTML, CSS, TypeScript nyelven íródott, Electron 
keretrendszer segítségével asztali alkalmazásként jelennek meg ezek a weblapok.

## Tesztterv

## Telepítési terv
+ **Fizikai telepítési terv**: Egy szervergépre MariaDB szoftver telepítése és
beüzemelése szükséges, majd erre szükséges feltölteni az adatbázis sémát a
megfelelő fájlokkal. Ugyanezen a szerveren szükséges a cargo parancssori
alkalmazás telepítése, és ezen keresztül való építése, futtatása a Rust 
forráskódnak.
+ **Szoftver telepítési terv**: A portál eléréséhez elég az alkalmazás
letöltése, telepítése, és futtatása egy olyan PC-n, amely internethez csatlakozik.

## Karbantartási terv
### Tartalmi karbantartás
A portálon megjelenő feltöltött tartalmak folyamatos ellenőrzés alatt állnak,
a nem kért, káros tartalmak törlésre kerülnek.\
Időszakosan végezhető karbantartás, akár automatizálva is a regisztrált
felhasználók neveinek ellenőrzése az esetlegesen előforduló sértő, káros szavak
használata ellen.\
Szintén időszakosan végezhető karbantartás, a troll felhasználók elleni
védelem, akik gyakran sértő megjegyzéseket tesznek más felhasználók tartalma
alá.
### Rendszeres karbantartás
+ **Adatbázis karbantartása**: Az adatbázisséma úgy van felépítve, hogy
automatikusan tisztul a törölt felhasználók posztjaitól, illetve a portálra
feltöltött tartalmak régi verziójától.\
Időszakosan végzett karbantartás a felesleges adatok törlése, pl. spam kommentek,
vagy inaktív felhasználók.\
Az adatbázisról rendszeresen biztonsági mentés készül a szerverre.
+ **Szerver karbantartása**: A szerver forráskódja megírása közben arra
törekedünk, hogy későbbiekben a kódhoz ne kelljen hozzányúlni karbantartási
célból (pl. függőségeknek elmentjük verziószámát).
