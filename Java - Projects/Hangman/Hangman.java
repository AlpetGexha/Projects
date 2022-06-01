package Hangman;

import java.io.File;
import java.io.FileNotFoundException;
import java.util.ArrayList;
import java.util.List;
import java.util.Random;
import java.util.Scanner;

public class Hangman {

	public static void main(String args[]) throws FileNotFoundException {

		String word;

		Scanner keyboard = new Scanner(System.in);
		System.out.println("1 apo 2 Lojtar?	");
		String player = keyboard.nextLine();

		if (player.equals("1")) {
			System.out.println("Loja me 1 Lojtar \n");
//		Get Random Word for file
			Scanner s = new Scanner(new File("src/Hangman/hangman-word.txt"));

			List<String> words = new ArrayList<>();

			while (s.hasNext()) {
				words.add(s.nextLine());
			}

			Random rand = new Random();

			word = words.get(rand.nextInt(words.size()));

		} else {
			System.out.println("Loja me 2 Lojtar \n");
			System.out.println("Lojtari 1 Shkruani fjalën tuaj: ");
			word = keyboard.nextLine();
			word = word.replaceAll("\\s", "").toLowerCase();
			System.out.println("\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n\n");
			System.out.println("Lojtari 2 paq fat.");
		}

//		System.out.println(word);

		List<Character> playerGuesses = new ArrayList<>();

		Integer wrongCount = 0;
//		boolean game = true;
		while (true) {

			getHangMan(wrongCount);
			getWordState(word, playerGuesses);

//			nese ben me  shume se 6 gabime
			if (wrongCount >= 6) {
				System.out.println("\t HANGMAN! KENI HUMBUR!\n");
				System.out.print("Fjala ishte: \"" + word + "\"");
				break;
			}

			if (!getPlayerGuess(keyboard, word, playerGuesses))
				wrongCount++;

//			Nese keni gjetur të gjitha karakteret
			if (getWordState(word, playerGuesses)) {
				System.out.println("\n\tURIME KENI FITUAR\n");
				break;
			}

//			Nese keni  gjetur fjalin e ploteF
			System.out.println("Çfarë fjalie mendoni se është: ");
			if (keyboard.nextLine().toLowerCase().equals(word)) {
				System.out.println("\n\tURIME KENI FITUAR\n");
				break;
			} else
				System.err.println("Jo! Provo përsëri. ");

		}

	}

	public static void getHangMan(int wrongCount) {
		System.out.println(" -------");
		System.out.println(" |     |");
		if (wrongCount >= 1) {
			System.out.println(" O");
		}

		if (wrongCount >= 2) {
			System.out.print("\\ ");
			if (wrongCount >= 3) {
				System.out.println("/");
			} else {
				System.out.println("");
			}
		}

		if (wrongCount >= 4) {
			System.out.println(" |");
		}

		if (wrongCount >= 5) {
			System.out.print("/ ");
			if (wrongCount >= 6) {
				System.out.println("\\");
			} else {
				System.out.println("");
			}
		}
		System.out.println("\n\n");
	}

	public static boolean getPlayerGuess(Scanner keyboard, String word, List<Character> playerGuesses) {
		System.out.print("Shkruani një shkronjë: ");
		String letterGuess = keyboard.nextLine();
		letterGuess = letterGuess.toLowerCase();
		playerGuesses.add(letterGuess.charAt(0));

		return word.contains(letterGuess);
//		getWordState(word, playerGuesses);
	}

	public static boolean getWordState(String word, List<Character> playerGuesses) {
		int currectCount = 0;

		for (int i = 0; i < word.length(); i++) {
			if (playerGuesses.contains(word.charAt(i))) {
				System.out.print(word.charAt(i));
				currectCount++;
			} else
				System.out.print("-");
		}
		System.out.println();
		return (word.length() == currectCount);
	}

}
