package Projeckte;

import java.util.*;

public class Main {

	static void shfaqOpsionet() {

		System.out.println("Shtyp 1 Për të regjistruar studentat");

	}

	static ArrayList<Studenti> listaStudenteve = new ArrayList<Studenti>();

	public static void main(String[] args) {

		//

//	Scanner s = new Scanner();
		int opsioni;
		Scanner s = new Scanner(System.in);
//		Studenti std = new Studenti();

		while ((opsioni = s.nextInt()) > 0) {
			if (opsioni == 1) {

				//code 1
				
			} else if (opsioni == 2) {

				// code 2

			} else if (opsioni == 3) {

				// code 3

			} else if (opsioni == 4) {

				// code 4

			} else if (opsioni == 5) {

				// code 5

			} else if (opsioni == 6) {

				// code 6

			}

			System.out.println(">");
			System.out.println(">");
			System.out.println(">");
			System.out.println(">");
			System.out.println("> PÃ«r tÃ« vazhduar shtypeni numrin nëntë (9)");

			if (s.nextInt() == 9)
				shfaqOpsionet();
			else
				break;
		}

		s.close();

		{
			System.out.println("> Aplikacioni pÃ«rfundoi");
			System.exit(1);
		}
	}

}
