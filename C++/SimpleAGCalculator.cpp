#include <iostream>
#include<limits>

using namespace std;

int main() {
    float num1, num2;
    while (true) {

        cout << "Shruani 2 numra: ";
        while (!(cin >> num1 >> num2)) {
            cin.clear();
            cin.ignore(numeric_limits < streamsize > ::max(), '\n');
            cout << "Invalid input, Provoni përsëri: ";
            //  cout << "Ju lutem shruani numra";
        }
        cout << endl << "Shuma: " << num1 + num2 << endl;
        cout << "Zbritja: " << num1 - num2 << endl;
        cout << "Shumëzimi: " << num1 * num2 << endl;
        cout << "Pjestimi: " << num1 / num2 << endl << endl;

    }

}