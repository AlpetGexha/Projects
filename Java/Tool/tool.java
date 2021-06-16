package Challage1;
import java.util.Scanner;
public class tool {
	
	public static void mosha (int mosha) {
		System.out.println(mosha*365 + " dite i vjeter" );
	}
	
	public static void Ftemp(double temp) {
		System.out.println((temp - 32) *(5.0/9.0)  + "F");
	}
	
	public static void Ctemp (double temp) {
		System.out.println((temp * 9/5) + 32 + "C");
	}
	
	
	public static void PlotPjetimi (int num) {
		
	if((num % 2 == 0) && (num % 3 == 0) && (num % 5 == 0) ) {
			System.out.println("Numri "+ num +" plotpjestohet me 2,3 dhe 5");
	}
	else if((num % 2 == 0) && (num % 3 == 0)) {
		System.out.println("Numri "+ num +" plotpjestohet me 2 dhe 3");
	}
	else if((num % 2 == 0) && (num % 5 == 0) ) {
		System.out.println("Numri "+ num +" plotpjestohet me 2 dhe 5");
	}
	else if((num % 3 == 0) && (num % 5 == 0) ) {
		System.out.println("Numri "+ num +" plotpjestohet me 3 dhe 5");
	}
	
	else if((num % 2 == 0) ^ (num % 3 == 0) ^ (num % 5 == 0) ) {
		System.out.println("Numri "+ num +" plotpjestohet me 2,3 ose 5 po jo me te 3t");
	}
	else if((num % 2 == 0) ) {
		System.out.println("Numri "+ num +" plotpjestohet me 2");
	}
	else if(num % 3 == 0) {
		System.out.println("Numri "+ num +" plotpjestohet me 3");
	}
	else if(num % 5 == 0) {
		System.out.println("Numri "+ num +" plotpjestohet me 5");
	}

	
	
	else System.out.println("Numri nuk plotepjesetohet as me 2 as me 3  dhe madje as me 5");
	}
	
	public static void main(String[] args) {
		Scanner s = new Scanner(System.in);
		System.out.println("<\n<\n<\n "+ 
		  "Shtypni 1 për të kther moshën në ditë \n "
		+ "Shtypni 2 për të kther F(Fahrenhe) në C(Celsius) \n "
		+ "Shtypni 3 për të kther C(Celsius) në F(Fahrenhe) \n "
		+ "Shtypni 3 për të kther C(Celsius) në F(Fahrenhe) \n "
		+ "Shtypni 4 për të treguar plotpjestimin e numirt me 2,3 dhe 5 "
		+ "\n<\n<\n<\n");
		char answar = ' ';
		System.out.print("Çfarë dëshironi të përdorni: ");
		 answar = s.nextLine().charAt(0);
		 
		 switch (answar) {
		 case '1':
			 
			 System.out.print("Shruani moshen: ");
			 int mosha = s.nextInt();
			 mosha(mosha);
			 break;
			 
		 case '2':

			 System.out.print("Shruani Temperaturen në F(Fahrenhe): ");
			 double Ftemp = s.nextDouble();
			 Ftemp(Ftemp);
			 break;

		 case '3':
			 
			 System.out.print("Shruani Temperaturen në C(Celsius): ");
			 double Ctemp = s.nextDouble();
			 Ctemp(Ctemp);
			 break;
			 
		 case '4':

			 System.out.print("Shkruani numrin: ");
			 int PNumber = s.nextInt();
			 PlotPjetimi(PNumber);
			 break;

		default:
			System.out.println("invalied");
		
		}
	
	}
}
