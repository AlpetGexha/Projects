package simpleATM;

import java.util.Scanner;

public class main {
	public static void atm() {
		long balanca = 100000;
		Scanner s = new Scanner(System.in);

		System.out.println("Prek opsionet: \n" + "1 - Deposito \n" + "2 - Terhiq \n" + "3 - Shkiko balacin");
		int choise = s.nextInt();

		switch (choise) {
		case 1: {
			System.out.println("Shkruani shumen: ");
			balanca -= s.nextInt();
			System.out.println("Balanca juaj eshte: " + balanca);
			break;
		}
		case 2: {
			System.out.println("Shkruani shumen: ");
			balanca += s.nextInt();
			System.out.println("Balanca juaj eshte: " + balanca);
			break;
		}
		case 3: {
			System.out.println("Balanca juaj eshte: " + balanca);
		}
		}
	}

	public static void main(String[] args) {
		int pin = 0000;

		System.out.println("Pershendtje. ");
		Scanner s = new Scanner(System.in);

		System.out.println("Shkruani pinin: ");
		if (pin == s.nextInt()) {
			atm();
		} else {
			System.out.println("PIN-i GABIM!! /n" + "Provoni përsër");

		}

		s.close();

	}
}
