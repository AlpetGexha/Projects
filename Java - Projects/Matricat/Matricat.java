package Challange;

import java.util.Scanner;
public class Matricat {
	
	public static void ShfqaMatricat(int[][] matrica) {
		for(int i = 0; i < matrica.length; i++) {
			for(int c = 0; c < matrica.length; c++) {
				System.out.println(matrica[i] + "\t");
				}
			System.out.println();
			}
		}

	
	public static void Mbledhja (int[][] first, int[][]second) {
		int row = first.length;
		int col = first[0].length;
		int[][] sum = new int[row][col];
		
		for(int i = 0; i < row; i++) {
			for(int c = 0; c < col; c++) {
				sum[i][c] = first[i][c] + second[i][c] ;
			}
		}
		System.out.println("\nMledhja e matricatve:\n");
		ShfqaMatricat(sum);
		
	}
	public static void main(String[] args) {
		Scanner s = new Scanner(System.in);
		System.out.print("Shruani numrin e rreshtave: ");
		int row = s.nextInt();
		System.out.print("Shkruani numrin e kolonave: ");
		int col = s.nextInt();
		
		int[][] first = new int[row][col];
		int[][] second = new int [row][col];
		
		for(int i = 0; i < row; i++) {
			for(int c = 0; c < col; c++) {
				System.out.println(String.format("Shrunai matricen e parë[%d][%d]: ", i, c));
				 first[i][c] = s.nextInt();
			}
		}
		
		for (int i = 0; i < row; i++) {
			for (int c = 0; c < col; c++) {
				System.out.println(String.format("Shruani matricen e dytë [%d][%d]: ", i, c));
				second[i][c] = s.nextInt();
			}
		}
		s.close();
		
		System.out.println("Matarica e parë:\n");
		ShfqaMatricat(first);
		System.out.println("Matarica e dytë:\n");
		ShfqaMatricat(second);
		
		Mbledhja(first, second);
		
	}
}
