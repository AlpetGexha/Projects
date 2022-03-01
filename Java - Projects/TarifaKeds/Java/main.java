import java.util.Scanner;

public class main {

	public static void main(String[] args) {
		/**
		 * a1 = Rryma e shtrejt mbi 800 kwh a2 = Rryma e lire mbi 800 kwh b1 = Rryma e
		 * shtrejt nër 800 kwh b2 = Rryma e lire nër 800 kwh
		 * 
		 */
		float ShumaTotale, a1, a2, b1, b2;

		final double TaksaFikse = 1.74;
		final double CmimiMetLiren = 0.0675;
		final double CmimiMetShtejt = 0.0289;
		final double TVSH = 1.08;
		
		int choise;

//		float RrymaMetShtrejt = 800;
//		float RrymaMetLir = 900;

		Scanner s = new Scanner(System.in);

		do {
			
			System.out.print("Jep rrymen met shtrejt: ");
			float RrymaMetShtrejt = s.nextFloat();
			

			System.out.print("Jep rrymen met lirë:    ");
			float RrymaMetLir = s.nextFloat();

//			Totali
			ShumaTotale = RrymaMetShtrejt + RrymaMetLir;

//			Perqindjet
			float PerqindjaMetShtrejt = RrymaMetShtrejt / ShumaTotale; // 0.47%
			float PerqindjaMetLir = RrymaMetLir / ShumaTotale; // 0.52%

//			Nësë totali i rrymes është me pak se 800 KWH
			if (ShumaTotale > 800) {
				b1 = ((ShumaTotale - 800) * PerqindjaMetShtrejt);
				b2 = ((ShumaTotale - 800) * PerqindjaMetLir);
			} else {
				b1 = 0;
				b2 = 0;
			}

			a1 = RrymaMetShtrejt - b1;
			a2 = RrymaMetLir - b2;

//			Pagesa
			double Pagesa = (a1 * CmimiMetLiren) + (a2 * CmimiMetShtejt) + (b1 * 2 * CmimiMetLiren)
					+ (b2 * 2 * CmimiMetShtejt) + TaksaFikse;

//			Me TVSH
			double PagesaMeTVSH = Pagesa * TVSH;

//			setText(new DecimalFormat("##.##").format(i2))

			System.out.println(
					"Përqindja met Shtrejten: \t" 		+ (textFormat(PerqindjaMetShtrejt * 100)) + "%" + '\n' +
					"Përqindja met Liren: \t\t" 		+ (textFormat(PerqindjaMetLir * 100)) + "%" + '\n' +
					"Rryma met Shtrejen mbi 800kwh:  "	+ textFormat(a1) + "kwh"  + '\n'+
					"Rryma met Liren mbi 800kwh: \t" 	+ textFormat(a2) + "kwh" + '\n'+
					"Rryma met Shtrejen nër 800kwh:  "	+ textFormat(b1) + "kwh" + '\n'+
					"Rryma met Liren nër 800kwh:     " 	+ textFormat(b2) + "kwh" + '\n'+ 
					"PAGESA: \t\t\t" 					+ textFormat(Pagesa) + "€" + '\n' +
					"Pagesa Me TVSH: \t\t"		   		+ textFormat(PagesaMeTVSH) + "€"  + '\n' + '\n'
					);
			
			System.out.print("Shtyp 1 për të vazhduar: ");
			choise = s.nextInt();
			if(choise != 1) {
				System.out.println("> Aplikacioni përfundoi");
				System.exit(1);
				break;
				
			}

		}while (choise == 1);
	}

	public static String textFormat(float value) {
		return (String.format("%.2f", value));
	}
	
	public static String textFormat(double value) {
		return (String.format("%.2f", value));
	}
}
