package StudentMenager;

import java.util.*;

public class Main {

	static Scanner s = new Scanner(System.in);
	static Studenti std = new Studenti();

	/** Jep te gjitha opionet e Aplikacionit */
	static void shfaqOpsionet() {
		System.out.print(
				"\n>\n>\n>\n>\n" + "  Shtyp 1 psër të regjistruar student \n" + "  Shtyp 2 për të kërkuar student\n"
						+ "  Shtyp 3 për të shfaqur te gjithë listën e studentave" + "\n>\n>\n>\n>\n" + "Jep numrin: ");
	}

	/**
	 * Gjeje studentin me idn e caktuar
	 * 
	 * @param {@code int} ID
	 */
	static Studenti getStudentin(int id) {
		for (Studenti student : listaStudenteve) {
			if (student.getId() == id) {
				return student;
			}
		}

		return null;
	}

	/**
	 * Shfaqi të gjith studentent
	 */
	static void getAllStudent() {
		for (Studenti student : listaStudenteve) {

			System.out.print(String.format(
					"ID:\t\t %s \nEmri:\t\t %s\nMbiemri:\t %s\nPrindit:\t %s\nEmail:\t %s \nTelefoni: \t %s \nDrejtimi:\t %s\nNota Mesatare:\t %s\n",
					String.valueOf(student.getId()), student.getEmri(), student.getMbiemri(), student.getEmriPrindit(),
					student.getEmail(), student.getNumber(), student.getDrejtimi(),
					String.valueOf(student.getNotaMesatare())));
		}
	}

	/**
	 * Shfaqi të gjitha drejtimet
	 */
	public static void getDrejtimet() {
		int i = 1;
		for (String drejtimet : listaDrejtimet) {
			System.out.println(i++ + " >" + drejtimet);
		}
	}

	/** Lisata e Studentave */
	static ArrayList<Studenti> listaStudenteve = new ArrayList<Studenti>();
	/** Lisata e Drejtimeve */
	static ArrayList<String> listaDrejtimet = new ArrayList<String>();

//	final public static void studentiString() {
//		System.out.print(String.format(
//				"ID:\t\t %s \nEmri:\t\t %s\nMbiemri:\t %s\nPrindit:\t %s\nEmail:\t %s \nTelefoni: \t  %s \nDrejtimi:\t %s\nNota Mesatare:\t %s\n",
//				String.valueOf(std.getId()), std.getEmri(), std.getMbiemri(), std.getEmriPrindit(), std.getEmail(),
//				std.getNumber(), std.getDrejtimi(), String.valueOf(std.getNotaMesatare())));
//	}

	/**
	 * E kthen shronjen e parë te fjalës të madhe {@code name = Name}
	 * 
	 * @param {@code String}
	 * @return Shkronjen e parë të madhe
	 */
	final public static String ucfirst(String subject) {
		return Character.toUpperCase(subject.charAt(0)) + subject.substring(1);
	}

	/**
	 * I heq White space, Simboletn, Numrat dhe vetem shronja e pare eshte e
	 * madhe<br >
	 * {@code a lpet @31 G}
	 * 
	 * @param {@code String}
	 * @return Alpetg
	 * 
	 */
	final public static String strongString(String subject) {
		subject = subject.replaceAll("\\s", "").replaceAll("\\d", "").replaceAll("[^a-zA-Z0-9]", "").toLowerCase();
		return ucfirst(subject);
	}

//	public static String strlen(String value, int length) {
//		if (value.length() > length)
//			return value.substring(0, length);
//		return value;
//	}
	/**
	 * Tregon a është numri i telefonit valid për Kosovë <br>
	 * 
	 * @param {@code} "8Shifra"
	 * @return {@code boolean} <br>
	 *         <br>
	 *         Valid për 123456789 : true <br>
	 *         Valid për 123 456 789 : true <br>
	 *         Valid për 123 456 789 : true <br>
	 *         Valid për 123-456-789 : true <br>
	 *         Valid për 986676754 : true <br>
	 * 
	 */
	private static boolean validatePhoneNumber(String phoneNumber) {
		if (phoneNumber.matches("\\d{9}"))
			return true;
		else if (phoneNumber.matches("\\d{3}[-\\.\\s]\\d{3}[-\\.\\s]\\d{3}"))
			return true;
		else if (phoneNumber.matches("\\d{3}-\\d{3}-\\d{3}\\s(x|(ext))\\d{3,5}"))
			return true;
		else if (phoneNumber.matches("\\(\\d{3}\\)-\\d{3}-\\d{3}"))
			return true;
		else if (phoneNumber.matches("\\d{3}[-\\.\\s]\\d{3}[-\\.\\s]\\d{3}"))
			return true;

		else if (phoneNumber.matches("\\(\\d{3}\\)-\\d{3}-\\d{3}"))
			return true;
		else
			return false;

	}

	public static void main(String[] args) {
		System.out.println("> Aplikacioni për Menagjimin e Studentave");
		shfaqOpsionet();

//	Scanner s = new Scanner();
		int opsioni;
		Scanner s = new Scanner(System.in);
		Studenti std = new Studenti();
		/* ************* ************* */
		/* ************* Lisata e Drejtimeve ************* */
		listaDrejtimet.add("Makineri - Automekanik");
		listaDrejtimet.add("Makineri - Operator Prodhimi");
		listaDrejtimet.add("Makineri - Operator Prodhimi");
		listaDrejtimet.add("Elektroteknikë - Informatikë");
		listaDrejtimet.add("Elektroteknikë - Instalues Elektrik");
		listaDrejtimet.add("Elektroteknikë - Energjetikë");
		listaDrejtimet.add("Ndertimtari - Ndertimtari");
		listaDrejtimet.add("Ndertimtari - Arkitektur");
		listaDrejtimet.add("Art pamor - Dizajn i veshjeve");
		listaDrejtimet.add("Tekstil - Rrobaqepësi");

		while ((opsioni = s.nextInt()) > 0) {
			if (opsioni == 1) {

				/* ******************* Regjistrimi ******************* */

				/* ************* ID-ja ************* */
				System.out.print("Shruani id e Studenti: ");
				while (!s.hasNextInt()) {
					System.out.print("\nID-ja duhet të jëtë number: ");
					s.next();

				} // Nese nuk ekzioston ID -ja
				int id = s.nextInt();
				if (id == std.getId()) {
					System.out.print("\nIdja eksison jep një id tjeter: ");
					s.next();
				} else
					std.setId(id);
				System.out.println();

				/* ************* Emri ************* */
//				System.out.print("Shruani Emrin e Studenti: ");
//				try {
//					std.setEmri(strongString(s.next()));
//				} catch (StringIndexOutOfBoundsException e) {
//					System.out.print("Ju lutem shruani Emrin si duhet(Pa numra): ");
//					std.setEmri(strongString(s.next()));
//				}

				String setEmri;
				boolean emriCeck = false;

				while (!emriCeck) {

					System.out.print("Shkruani Emrin: ");
					setEmri = s.next();

					emriCeck = setEmri.matches("[a-zA-Z]+$");
					if (!emriCeck) {
						System.out.print("InvalidName ");
					} else
						std.setEmri(strongString(setEmri));
				}
				System.out.println();

				/* ************* Mbiemri ************* */
//				System.out.print("Shruani Mbiemrin e Studenti: ");
//				try {
//					std.setMbiemri(strongString(s.next()));
//				} catch (StringIndexOutOfBoundsException e) {
//					System.out.print("Ju lutem shruani Mbiemrin si duhet(Pa numra): ");
//					std.setMbiemri(strongString(s.next()));
//				}
				String setMbiemri;
				boolean mbiemriCeck = false;

				while (!mbiemriCeck) {

					System.out.print("Shkruani Mbiemrin: ");
					setMbiemri = s.next();

					mbiemriCeck = setMbiemri.matches("[a-zA-Z]+$");
					if (!mbiemriCeck) {
						System.out.print("Mbiemir Invalid ");
					} else
						std.setMbiemri(strongString(setMbiemri));
				}
				System.out.println();

				/* ************* Emri i Prindit ************* */
				String setEP;
				boolean EPCeck = false;

				while (!EPCeck) {

					System.out.print("Shkruani Emrin e Prindit: ");
					setEP = s.next();

					EPCeck = setEP.matches("[a-zA-Z]+$");
					if (!EPCeck) {
						System.out.print("Emri Invalid ");
					} else
						std.setEmriPrindit(strongString(setEP));
				}
				System.out.println();

				/* ************* Email ************* */
				String setEmail;
				boolean emailCeck = false;

				while (!emailCeck) {

					System.out.print("Shkruani Emailin: ");
					setEmail = s.next();

					emailCeck = setEmail.matches("^[\\w-_\\.+]*[\\w-_\\.]\\@([\\w]+\\.)+[\\w]+[\\w]$");
					if (!emailCeck) {
						System.out.print("InvalidEmail ");
					} else
						std.setEmail(setEmail);
				}

				/* ************* Numri ************* */
				/*
				 * System.out.print("Shkruani Numrin e telefonit: "); String numberRule =
				 * "(0/91)?[0-5][0-9]{8}"; while (!s.next().matches(numberRule)) {
				 * System.out.println("p.sh 044x xxx xxx");
				 * System.out.print("Numri duhet të jetë valid: "); // s.next(); }
				 * std.setNumber(s.next().replaceAll("\\s", ""));
				 */
				String setNumber;
				boolean numberCeck = false;

				while (!numberCeck) {

					System.out.print("Shkruani Numrin e telfonit: ");
					setNumber = s.next().replaceAll("\\s", "");

					numberCeck = validatePhoneNumber(setNumber);
					if (!numberCeck) {
						System.out.print("Invalid Number (04x xxx xxx) ");
					} else
						std.setNumber(setNumber);
				}
				System.out.println();
				/* ************* Drejtimet ************* */
				System.out.print("Drejtimet Tona: \n");
				getDrejtimet();
				System.out.println("");
				System.out.print("\nShruaj numrin e drejtimit: ");
				try {
					String x = null;
					int choiseDrejtimi = s.nextInt();
					int i = 1;
					for (String Drejtimet : listaDrejtimet) {
						if (choiseDrejtimi == i++) {
							x = Drejtimet;
						}

					}
					std.setDrejtimi(x);
				} catch (StringIndexOutOfBoundsException e) {
					System.out.print("Ju lutem shkruani drejtimin nurmin e drejtimit:  ");
					s.next();
				}

				System.out.println();

				/* ************* Nota Mesatare ************* */
				System.out.print("Shruani Noten Mesatare të Studentit: ");

				while (!s.hasNextFloat()) {
					System.out.print("Nota duhet të jëtë number me pi p.sh(4.5, 5.0): ");
					s.nextFloat();

				}
				float ez = s.nextFloat();
				while (ez > 5.1) {
					System.out.println("(" + ez + ") Nota makimale është 5: ");
					ez = s.nextFloat();
				}
				std.setNotaMesatare(ez);
				System.out.println();
				// later - Nota me e madhe se 5 == error

				// Regjistrimi i të dhënave
				listaStudenteve.add(std);
				System.out.println(
						"\nStudenti " + std.getEmri() + " " + std.getMbiemri() + " " + " u regjistrua me sukses\n");

			} else if (opsioni == 2) {

				/* ************* Kerko per studenta ************* */
				System.out.print("Shruaj ID-n e Studentit: ");
				int studentID = s.nextInt();
				Studenti stdStudenti = getStudentin(studentID);

				if (stdStudenti == null) {
					System.out.println("Studenti nuk eksiston");
				} else {
					System.out.print(String.format(
							"ID:\t\t %s \nEmri:\t\t %s\nMbiemri:\t %s\nPrindit:\t %s\nEmail:\t\t %s \nTelefoni: \t %s \nDrejtimi:\t %s\nNota Mesatare:\t %s\n",
							String.valueOf(std.getId()), std.getEmri(), std.getMbiemri(), std.getEmriPrindit(),
							std.getEmail(), std.getNumber(), std.getDrejtimi(), String.valueOf(std.getNotaMesatare())));

				}

			} else if (opsioni == 3) {

				/* ************* Drejo të gjithë Studentat ************* */
				getAllStudent();
				// Later - ADD error nese nuk ka student

			} // else if (opsioni == 4) {}

			System.out.println("> Për të vazhduar shtypeni numrin nëntë (9)");
			System.out.print("Shtyp 9: ");

			if (s.nextInt() == 9)

				shfaqOpsionet();
			else
				break;
		}

		s.close();

		{
			System.out.println("> Aplikacioni përfundoi");
			System.exit(1);
		}

	}

}
