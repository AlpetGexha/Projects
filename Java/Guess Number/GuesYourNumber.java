package Challage1;
import java.util.Scanner;
public class GuesYourNumber {
	
	
	public static void main(String[] args) {
		Scanner s = new Scanner(System.in);
		
		int ComputerNumber = (int)(Math.random() *1000 );
		System.out.println(ComputerNumber);
		System.out.print("Shkruani Numrin: ");
		int YourNumber = s.nextInt();
		
		int FirstCompNumber =  ComputerNumber / 100;
		int SecondCompNumber = ComputerNumber / 100;
		int TherdCompNumber = ComputerNumber % 10;
		
		int  FirstYouNumber = YourNumber /  100;
		int  SecondYouNumber = YourNumber / 10;
		int  TherdYouNumber = YourNumber % 10;
		
		System.out.println(FirstYouNumber);
		System.out.println(SecondYouNumber);
		System.out.println(TherdYouNumber);
		
		if(ComputerNumber == YourNumber) {
			System.out.println("Urime ju keni keni fituar!!!");
		}else if ( (FirstCompNumber == FirstYouNumber) && (SecondCompNumber == SecondYouNumber)  ) {
			System.out.println("2 të fiksuar");
		} else if ( (FirstCompNumber == FirstYouNumber) && (TherdCompNumber == TherdYouNumber)  ) {
			System.out.println("2 të fiksuar");
		} else if ( (SecondCompNumber == SecondYouNumber) && (TherdCompNumber == TherdYouNumber)  ) {
			System.out.println("2 të fiksuar");
		} else {System.out.println("NUJK KA");}
		
		
	}
}
