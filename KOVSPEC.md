# Követelmény specifikáció

## Áttekintés
> AFP gyakorlat órára kell beadandót készítenünk, erre a legjobb közös ötlet egy filmértékelő weboldal, amelyben a felhasználó be tud jelentkezni, és a megnézett filmeket értékelni.  
> Az adminnak joga lesz filmeket hozzáadni és eltávolítani.

---

## A jelenlegi helyzet leírása
> Kezdek kiégni az egyetemtől, a pszichológusom dörzsöli a markát és nézi, hová szervezze a következő nyaralást.  
> Kezdek megkattanni a sok elvárástól és attól, hogy a tanítás úgy néz ki, hogy bedobnak a mély vízbe, aztán ússzál.  
> De az AFP óra csoportfeladata nagyon feldobna, ha lenne mindenkinek egy szabad órája, amit a projektre szánhatnánk.  
> Alig várom, hogy végezzek, és alulfizetett gyakornok legyek egy lelketlen multinál, ahol főzhetek kávét a kiégett senioroknak.  
> Az oldal lényege az lesz, hogy túl sok filmet néztünk meg eddig, és nem tudjuk nyomon követni őket (csak 4 másik platformon).

---

## Vágyálomrendszer
> Szeretnénk, ha a félév végén a tantárgy mellett a „teljesített” felirat lenne, és érdemjegyként jó eredményt érnénk el.  
> Ezt egy **Laravelben** elkészült weboldallal szeretnénk megvalósítani, amely:
> - tárolja a filmeket,  
> - a felhasználók értékelhetik őket,  
> - az admin pedig nyilvántartja, hozzáadja, törli vagy módosítja a filmeket.

---

## A jelenlegi üzleti folyamatok modellje
- **Igényfelmérés:**  
  Milyen funkciókat szeretnének a felhasználók használni (és miért kapnánk jó érdemjegyet)?
- **Regisztráció:**  
  A felhasználó létrehozhat egy profilt, amellyel megtekintheti az oldalt, majd értékelheti a filmeket.
- **Adminisztrátorok:**  
  Az adminok fogják kezelni a feltöltött filmeket.

---

## Igényelt üzleti folyamatok modellje
- **Filmek értékelése:**  
  Egy 1–10-ig terjedő skálán lehet értékelni a filmeket a belépett felhasználóknak.
- **Szűrés:**  
  Név szerint és megjelenési év szerint.
- **Lapozás:**  
  Betű és év szerint szűrve, külön oldalon lehet megjeleníteni az adott filmeket.

---

## Követelménylista

| Kód | Funkció | Leírás |
|-----|----------|--------|
| k1 | Felület – regisztráció | Regisztrációs oldal a felhasználóknak |
| k2 | Felület – bejelentkezés | Belépési felület meglévő profilhoz |
| k3 | Felület – kategóriák | Filmek kategorizálása |
| k4 | Felület – filmek | Filmek listázása és megtekintése |
| k5 | Felület – kommentelési lehetőség | A filmekhez hozzászólás írása |
| k6 | Felület – értékelési lehetőség | 1–10 közötti értékelés |
| k7 | Felület – kedvencekhez adás | Filmek mentése kedvencek közé |
| k8 | Felület – megjelölés megnézettként | Filmek megjelölése megtekintettként |
| k9 | Jogosultság – jogosultsági szintek | Admin és felhasználó jogosultságainak kezelése |

---


