import java.util.*;
import java.io.*;

public class PrimeFactor{

	private static ArrayList<Character> number = new ArrayList<Character>();
	private static String string_number = new String();
	private static String stringToPrint = new String();

	public static void main(String[] args){
		System.out.println("Enter numbers and see what comes out");
		
		char c = ' ';
	    while(true) { 
	       try {
	      		c = (char)System.in.read();
	        } catch (IOException e) {
	        	System.exit(1);
	    	}
	    	if (c == '\n')
	        break;

	    	if(c != ' ' && Character.isDigit(c)){
	    		number.add(c);
	    	}
	    }

	    for (int x = 0; x < number.size(); x++) {
	    	string_number += number.get(x);
	    }

	    if(string_number.length() > 0){

	    	int final_Number = Integer.parseInt(string_number);


	    	if(checkIfPrime(final_Number)){

	    		System.out.println(final_Number + " is prime");
	    	}else{
	    		stringToPrint += Integer.toString(final_Number) + " prime factorization\n";
	    		primeFactor(final_Number);
	    	}
		} else {
			System.out.println("Your number was not a number.");
		}
	}


	public static void primeFactor(int numberToFactor){
		int free_number = numberToFactor;

		ArrayList<Integer> listOfPrimeFactors = new ArrayList<Integer>();

		for (int x = 2; x < free_number; x++) {
			if(checkIfPrime(x) && checkIfPrime(free_number) == false){
				if(free_number % x == 0){
					int holder = free_number;
					free_number = free_number / x;
					listOfPrimeFactors.add(x);
					stringToPrint += (holder + " / " + x + " = " + free_number + " R " + (holder%x) + "\n");
					x = x-1;
				}else{
					stringToPrint += (free_number + " / " + x + " = " + (free_number/x) + " R " + (free_number%x) + "\n");
				}
			}
		}
		listOfPrimeFactors.add(free_number);

		stringToPrint += numberToFactor + " = ";
		for (int x = 0; x < listOfPrimeFactors.size(); x++) {
			if(x < listOfPrimeFactors.size()-1){
				stringToPrint += listOfPrimeFactors.get(x) + " * ";
			}else{
				stringToPrint += listOfPrimeFactors.get(x);
			}
		}

		System.out.println(stringToPrint);
	}


	public static Boolean checkIfPrime(int number){
		if(number == 0 || number == 1){
			return true;
		} else {
			for (int x = 2; x < number; x++) {
				if(number % x == 0){
					return false;
				}
			}
			return true;
		}
	}


}