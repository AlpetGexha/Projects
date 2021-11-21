package Calculator;

import java.util.*;

public class Calculator {

	public static double calc(String expre) { // expression

		if (!(expre.contains("+") || expre.contains("-") || expre.contains("*") || expre.contains("/"))) {
			return Integer.valueOf(expre);
		}

		double result = 0;
		for (int i = 0; i < expre.length(); i++) {

			char symbol = expre.charAt(i);
			if (!Character.isDigit(symbol)) { // Symbol

				double operand1 = Integer.parseInt(expre.substring(0, i));

				switch (symbol) {
				case '+':
					result = operand1 + calc(expre.substring(i + 1));
					break;
				case '-':
					result = operand1 - calc(expre.substring(i + 1));
					break;
				case '*':
					result = operand1 * calc(expre.substring(i + 1));
					break;
				case '/':
					result = operand1 / calc(expre.substring(i + 1));
					break;
				}

				break;
			}
		}
		return result;
	}

	public static void main(String[] args) {

		Scanner s = new Scanner(System.in);

		int i = 0;
		while (i < 1) {
			System.out.println("Calculator:");
			String setCalcNum;
			boolean calcNumCheck = false;

			while (!calcNumCheck) {
				setCalcNum = s.nextLine();

				calcNumCheck = setCalcNum.matches("[0-9_*+-/]*$");
				if (!calcNumCheck) {
					System.out.print("InvalidNumber ");
				} else {
					double result = calc(setCalcNum);
					System.out.println(setCalcNum + "\n= " + result);
				}

			}
		}
//s.close();

	}

}
