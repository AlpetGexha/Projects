#include <iostream>

using namespace std;

int main() {
    float ShumaTotale, a1, a2, b1, b2;
    float RrymaMetShtrejt, RrymaMetLir;
    const double TaksaFikse = 1.74;
    const double CmimiMetLiren = 0.0675;
    const double CmimiMetShtejt = 0.0289;
    const double TVSH = 1.08;

    int choise;

    do {
        cout << "Jep rrymen met shtrejt: ";
        cin >> RrymaMetShtrejt;

        cout << "Jep rrymen met lirë:    ";
        cin >> RrymaMetLir;

        //			Totali
        ShumaTotale = RrymaMetShtrejt + RrymaMetLir;

        //			Perqindjet
        float PerqindjaMetShtrejt = RrymaMetShtrejt / ShumaTotale; // 0.47%
        float PerqindjaMetLir = RrymaMetLir / ShumaTotale; // 0.52%

        //			Nësë totali i rrymes është me pak se 800 KWH
        if (ShumaTotale > 800) {
            b1 = ((ShumaTotale - 800) * PerqindjaMetShtrejt);
            b2 = ((ShumaTotale - 800) * PerqindjaMetLir);
        } else {
            b1 = 0;
            b2 = 0;
        }

        a1 = RrymaMetShtrejt - b1;
        a2 = RrymaMetLir - b2;

        //			Pagesa
        double Pagesa = (a1 * CmimiMetLiren) + (a2 * CmimiMetShtejt) + (b1 * 2 * CmimiMetLiren) +
            (b2 * 2 * CmimiMetShtejt) + TaksaFikse;

        //			Me TVSH
        double PagesaMeTVSH = Pagesa * TVSH;
        cout <<
            "Përqindja met Liren: \t\t" << (PerqindjaMetShtrejt * 100) << "%" << '\n' <<
            "Përqindja met Liren: \t\t" << (PerqindjaMetLir * 100) << "%" << '\n' <<
            "Rryma met Shtrejen mbi 800kwh:  " << a1 << "kwh" << '\n' <<
            "Rryma met Liren mbi 800kwh: \t" << a2 << "kwh" << '\n' <<
            "Rryma met Shtrejen nër 800kwh:  " << b1 << "kwh" << '\n' <<
            "Rryma met Liren nër 800kwh:     " << b2 << "kwh" << '\n' <<
            "PAGESA: \t\t\t" << Pagesa << "€" << '\n' <<
            "Pagesa Me TVSH: \t\t" << PagesaMeTVSH << "€" << '\n' << '\n';

        cout << "Shtyp 1 për të vazhduar: ";
        cin >> choise;
    } while (choise == 1);

    return 0;
}