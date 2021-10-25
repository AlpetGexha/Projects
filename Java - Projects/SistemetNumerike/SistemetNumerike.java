package SistemetNumerike;

import java.util.Scanner;

public class SistemetNumerike {
    public static void shfaqOpsionet() {


System.out.println(
		"\n>\n>\n>\n>\n"
		+ "\nShtyp 1 për numra binar \n"
		+ "Shtyp 2 për numra oktal \n"
		+ "Shtyp 3 për numra decimal \n"
		+ "Shtyp 4 për numra hexadecimal \n"
		+ "Shtyp 0 për të perfunduar Aplikacionin \n"
		+ "\n>\n>\n>\n>\n"
		);

    }
    
    //Decimal
    public static void binarMath(int num, int baseNum, String base) {
    	int binar[] = new int [1000];
    	int index = 0;
    	
    	while(num > 0) {
    		binar[index++] = num % baseNum;
    		num /= baseNum;
    	}
    	for(int i = index-1; i >= 0; i--) {
    		System.out.print(binar[i]);
    	}
    	System.out.print("("+base+")"+baseNum+ "\n");
    }

    public static void decToBinar(int decimal) {
    	binarMath(decimal,2,"Binar");
    }
   public static void decToOktal(int decimal) {
	   binarMath(decimal,8,"Oktal");
   }
   public static void decToHex(int decimal) {
	   
       int index;
       String hex = "";
       char hexchars[] = { '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F' };
       while (decimal > 0) {
           index = decimal % 16;
           
           hex = hexchars[index] + hex;
           decimal /= 16;
       }
       System.out.print(hex + " (Hexadecimal)16 \n");
   }
   
  //Binar
   
   public static int binarToDec(String binar) {

       int decimal = Integer.parseInt(binar, 2);
       System.out.print(decimal + " (Decimal)10 \n");
       return decimal;

   }

   public static void binarToOktal(String binar) {

       int num = Integer.parseInt(binar, 2);
       String oktal = Integer.toOctalString(num);
       System.out.print(oktal + " (Oktal)8 \n");

   }

   public static void binarToHex(String binar) {
       String hexadecimal = "";
       char[] hexchars = { '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F' };

       int decimal = binarToDec(binar);
       while (decimal > 0) {

           hexadecimal = hexchars[decimal % 16] + hexadecimal;
           decimal /= 16;
       }

       System.out.println(hexadecimal + " (Hexadecimal)16 \n");

   }

  

//   Oktal
   public static int oktalToDecimal(int num) {
	   int base = 1;
	   int index = 0;
	   
	   
	   while(num > 0 ) {
		   int oktalSum = num % 10;
		   num /= 10;
		   
		   index += oktalSum * base;
		   base *= 8;
	   }

	   return index;
   }
   
  public static void oktalToBinar(int num) {

	  int[] oktal = { 0, 1, 10, 11, 100, 101, 110, 111 };
      long base = 1;
      long binarNum = 0; 
      int index;

       while (num > 0) {
           index = (int) (num % 10);
           binarNum = oktal[index] * base + binarNum;
           num /= 10;
           base *= 1000;
       }
       System.out.print(binarNum + " (Binar)2 \n");
   
     
   }	   
   public static void oktalToHex(int oktal) {

       String hexadecimal = "";
       char[] hexchars = { '0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F' };

       int decimal = oktalToDecimal(oktal);
       while (decimal > 0) {

           hexadecimal = hexchars[decimal % 16] + hexadecimal;
           decimal /= 16;
       }

       System.out.println(hexadecimal + " (Hexadecimal)16 \n");

  
   }
   

//  Hexadecimal
   public static int hexToDecimal(String hex) {	  
       int num = Integer.parseInt(hex, 16);
       return num;
   }

   public static void hexToBinar(String hex) {

       long longs = Long.parseLong(hex, 16);
       String binary = Long.toBinaryString(longs);

       System.out.print(binary + " (Binar)2 \n");

   }

   public static void hexToOktal(String hex) {

       int decimalNumber, index = 1, i;
       int[] octalNumber = new int[100];

       decimalNumber = hexToDecimal(hex);
       while (decimalNumber > 0) {
           octalNumber[index++] = decimalNumber % 8;
           decimalNumber = decimalNumber / 8;
       }
       for (i = index - 1; i > 0; i--) {
           System.out.print(octalNumber[i]);
       }

       System.out.print(" (Oktal)8 \n");
   }
   
   public static void getBinar(String binar) {
	   binarToDec(binar);
	   binarToOktal(binar);
	   binarToHex(binar);
   }
   
   public static void getOktal(int oktal) {
	   System.out.print(oktalToDecimal(oktal));
	   System.out.println(" (Deciamal)10");
	   oktalToBinar(oktal);
	   oktalToHex(oktal);
   }
   
   public static void getDecimal(int decimal) {
       decToBinar(decimal);
       decToOktal(decimal);
       decToHex(decimal);
   }

   public static void getHexa(String hex) {
	   hexToDecimal(hex);
	   hexToBinar(hex);
	   hexToOktal(hex);
;   }

    public static void main(String[] args) {

        Scanner s = new Scanner(System.in);
        System.out.println("> Aplikacioni për Sistemin e Numrave");
        shfaqOpsionet();
        int choise;
        while ((choise = s.nextInt()) > 0) {
            if (choise == 1) {

                System.out.print("Shruani Numrin Binar: ");
                String binar = s.next().replaceAll("\\s+","");
                getBinar(binar);
                
            } else if (choise == 2) {
                System.out.print("Shruani Numrin Oktal: ");
                int oktal = s.nextInt();
                getOktal(oktal);

            } else if (choise == 3) {
                System.out.print("Shruani Numrin Decimal: ");
                int decimal = s.nextInt();
                getDecimal(decimal);


            } else if (choise == 4) {
                // hexadecimal
                System.out.print("Shruani numrin Hexadeximla: ");
                String hexa = s.next();
                getHexa(hexa);
                
            }

            System.out.println("\n>\n>\n>\n>\n");
            System.out.println("> Për të vazhduar shtypeni numrin pesë (5)");

            if (s.nextInt() == 5)
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
