//============================================================================
// Name        : AlpetGC++.cpp
// Author      : AlpetG
// Version     : v1.0
// Copyright   : AlpetG
// Description : Qello numrin random in C++, Ansi-style
//============================================================================

#include <iostream>

using namespace std;
int main()

{
    int i = 1; //Numri i shancave 
    while (true) {
        srand(time(NULL));
        int randomNumber = (rand() % 98 + 1);  //Numri randon nga 0-99

        int mainNumber; 
        cout << "Shkruani number nga 1-99 " << endl << "= ";
        cin >> mainNumber;

        int firstDigjitalRandom = randomNumber / 10; //numri i pare i randomNumber
        int secondDigjitalRandom = randomNumber % 10; //numri i dyte i randomNumber

        int firstDigjitalMain = mainNumber / 10; //numri i pare i mainNumber (Numri jone)
        int secondDigjitalMain = mainNumber % 10; //numri i dyte i mainNumber (Numri jone)
        /*
        * Nese numri p.sh eshte 16, 16/10= 1.6 po pasi eshte int resultati eshte 1
        *                           16%10 = 6 
        */

        cout << "Numri i final : " << randomNumber << endl;
        if (randomNumber == mainNumber)
            cout << "Urime! ju keni qelluar numrin e plot. " << "Pas " << i << "perpjekjeve" << "\n\n";
        else if ((firstDigjitalRandom == secondDigjitalMain) && (secondDigjitalRandom == firstDigjitalMain)) {
            cout << "Perudhje e pjeshme \n\n";
            i++;

        } else if ((firstDigjitalRandom == firstDigjitalMain)  ||
                   (firstDigjitalRandom == secondDigjitalMain) ||
                   (secondDigjitalRandom == firstDigjitalMain) ||
                   (secondDigjitalRandom == secondDigjitalMain)) {
            cout << "Keni qelluar vetem nje numer \n\n";
            i++;
        } else {
            cout << "Nuk keni qelluar as nje numer \n\n";
            i++;
        }
    }
    return 0;
}