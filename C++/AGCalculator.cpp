#include <iostream>
#include <cstring>


using namespace std;

int main() {
    char v[0]; // [0] nuk ka shume rendesi se Çfare numri eshte per momentin
    int sign, n, i;
    float result, num, aux, c;
    while (true) {
        cout << "Shkruani kalkulimin: " << endl;
        scanf("%s", v); //Scanf edhe njesoj si 'cin>>' vetem se ketu nuk ka  whitespace spatohet '/n', /t, ' '  dmth i eliminon te gjitha karakteret mas hapesites Nuk pranon numra me pik "float"
        n = strlen(v); // e marrim gjatesin e vargut 
        result = 0, num = 0, aux = 0, c = 0; // ju japim vlerat 0
        sign = 1, n, i = 0;
        while (i < n) // e përsërisim vetëm një herë permes vargut (array)
        {
            while (v[i] >= '0' && v[i] <= '9') //e ndërtojn numrin ku lejohen vetem numrat 0 - 9 "[0-9]"
            { //menyra e kalkulimit
                num = num * 10 + (v[i] - '0');
                i++;
            }
            switch (v[i]) // Trego operatorin
            {
            case '+': {
                //Shiko nese ka ndonje operator tjeter "*" ose "/"
                if (!(v[i - 1] == '*') && !(v[i - 1] == '/')) //nese a*-b ose a/-b nuk ben asgje ose nuk eksiton
                {
                    if (c == 1) // "*" u gjet para: "2*2+1"
                    {
                        result += aux * num * sign; // perditeso rezulltatin (Update)
                        aux = 0; //aux edhe berë restart

                    } else if (c == 2) { // "/" u gjet pata: "2/2+1"

                        result += aux / num * sign; // perditeso rezulltatin (Update)
                        aux = 0; //aux edhe berë restart

                    } else {
                        result += num * sign;
                    }

                    num = 0;
                    c = 0;
                }

                sign = 1;

                break;
            }
            case '-': {
                if (!(v[i - 1] == '*') && !(v[i - 1] == '/')) //nese a*-b ose a/-b nuk ben asgje ose nuk eksiton
                {
                    if (c == 1) // "*" u gjet para: "2*2+1"
                    {
                        result += aux * num * sign; // perditeso rezulltatin (Update)
                        aux = 0; //aux edhe berë restart

                    } else if (c == 2) { // "/" u gjet pata: "2/2+1"

                        result += aux / num * sign; // perditeso rezulltatin (Update)
                        aux = 0; //aux edhe berë restart

                    } else {
                        result += num * sign;
                    }

                    num = 0;
                    c = 0;
                }

                sign = -1;
                break;

            }
            case '*': {
                if (!aux) {
                    aux = num * sign; // aux mban resultain e "*" dhe "/"
                } else if (c == 2) { // 2 per "/"
                    aux /= num * sign;
                } else {
                    aux *= num * sign;
                }
                c = 1;
                num = 0;
                sign = 1;
                break;
            }
            case '/': {
                if (!aux) {
                    aux = num * sign;
                } else if (c == 1) { // 1 per "*"
                    aux *= num * sign;
                } else {
                    aux /= num * sign;
                }
                c = 2;
                num = 0;
                sign = 1;
                break;
            }
            default:
                ;
            }
            if (i >= (n - 1)) // përditëson rezultatin sepse nuk ka + ose - në fund të vargut(String).
            {
                if (c == 1) {
                    result += aux * num * sign;
                } else if (c == 2) {
                    result += aux / num * sign;
                } else {
                    result += num * sign;
                }
            }
            i++;
        }
        cout << "= " << result << endl << endl;


    }

}