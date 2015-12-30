/*

Date: November 10th;
Purpose: Roman Numeral exchanger
Creator: Travis Delly
*/

import java.util.*;

public class RomanNumeral{


	//Fast initialize Map.
    private static final Map<Integer, String> ROMAN_NUMBERS;
    static
    {
        ROMAN_NUMBERS = new HashMap<Integer, String>();
       	ROMAN_NUMBERS.put(1000, "M");
		ROMAN_NUMBERS.put(900, "CM");
		ROMAN_NUMBERS.put(500, "D");
		ROMAN_NUMBERS.put(400, "CD");
		ROMAN_NUMBERS.put(100, "C");
		ROMAN_NUMBERS.put(90, "XC");
		ROMAN_NUMBERS.put(50, "L");
		ROMAN_NUMBERS.put(40, "XL");
		ROMAN_NUMBERS.put(10, "X");
		ROMAN_NUMBERS.put(9, "IX");
		ROMAN_NUMBERS.put(5, "V");
		ROMAN_NUMBERS.put(4, "IV");
		ROMAN_NUMBERS.put(1, "I");
		ROMAN_NUMBERS.put(0, "");
    }

	public static Scanner input = new Scanner(System.in);

	public static void main(String[] args){

		while (true){

			try{
				System.out.println("1. Convert to Roman \n2. Convert to Number");
				int decision = input.nextInt();
				input.nextLine();
				if(decision == 1){
					System.out.print("Enter a number: ");
					int usrInput=input.nextInt();
					System.out.println("In roman we say: "+ itorn(usrInput));
				} else if( decision == 2){
					System.out.print("Enter a roman numeral: ");
					String usrInput=input.nextLine();
					System.out.println("In America we say: "+rntoi(usrInput));
				} else {
					System.out.println("Funny guy, eh?");
					System.exit(5);
				}
			}
			catch(InputMismatchException exception){
			  System.out.println("This is not an integer");
			}
			
		}

	}

	public static String itorn(int n){

		String returnString = new String();

		String changeableString = Integer.toString(n);

		int finalNumber;

		if(n >= 1000){
			finalNumber = 1000;
		}else if (n >= 100){
			finalNumber = 100;
		}else if (n >= 10){
			finalNumber = 10;
		}else{
			finalNumber = 1;
		}

		//Loop of the changeable string
		for (int x = finalNumber; x >= 1; x/=10) {
			int changeable = Integer.parseInt(changeableString);
			int multiple = changeable / x;

			//Get the roman numeral at spot.
			if((multiple == 4 || multiple == 9) && changeable < 1000){
				returnString += getRomanNumeral(Integer.toString(multiple), x);
			}else if(multiple >= 5 && changeable < 1000){
				returnString += getRomanNumeral("5", x);
				multiple -= 5;
				for (int i = 0; i < multiple; i++) {
					returnString += getRomanNumeral("1", x);
				}
			} else {
				for (int y = 0; y < multiple; y++) {
					returnString += getRomanNumeral("1", x);
				}
			}
			//Remove the front numbers.

			int minimum = Math.min(4, changeableString.length());
			changeableString = changeableString.substring(changeableString.length()-minimum+1);

			if(changeableString.length() > 0){
				if(Integer.parseInt(changeableString.substring(0,1)) == 0){
					changeableString = changeableString.substring(1, changeableString.length());
					x /= 10;
				}
			}
		}

		return returnString;
	}

	public static String getRomanNumeral(String number, int x){
		if(x == 1000){
			return (String)ROMAN_NUMBERS.get(Integer.parseInt(number+"000"));
		}else if(x == 100){
			return (String)ROMAN_NUMBERS.get(Integer.parseInt(number+"00"));
		} else if(x == 10){
			return (String)ROMAN_NUMBERS.get(Integer.parseInt(number+"0"));
		} else if(x==1){
			return (String)ROMAN_NUMBERS.get(Integer.parseInt(number));
		} else {
			return null;
		}
	}

	public static int rntoi(String romanNumber){
		int number = 0;
	    int lastNumber = 0;
	    String romanNumeral = romanNumber.toUpperCase();
	    //Make sure romanNumerals are uppercase.
	    for (int x = romanNumeral.length() - 1; x >= 0 ; x--) {
	        char convertToNumber = romanNumeral.charAt(x);
	        switch (convertToNumber) {
	            case 'M':
	                number = prcoessNumber(1000, lastNumber, number);
	                lastNumber = 1000;
	                break;

	            case 'D':
	                number = prcoessNumber(500, lastNumber, number);
	                lastNumber = 500;
	                break;

	            case 'C':
	                number = prcoessNumber(100, lastNumber, number);
	                lastNumber = 100;
	                break;

	            case 'L':
	                number = prcoessNumber(50, lastNumber, number);
	                lastNumber = 50;
	                break;

	            case 'X':
	                number = prcoessNumber(10, lastNumber, number);
	                lastNumber = 10;
	                break;

	            case 'V':
	                number = prcoessNumber(5, lastNumber, number);
	                lastNumber = 5;
	                break;

	            case 'I':
	                number = prcoessNumber(1, lastNumber, number);
	                lastNumber = 1;
	                break;
	        }
	    }
	    return number;
	}
	public static int prcoessNumber(int number, int last, int currentNumber) {
		//Makes sure that numbers like IV or IX and stuff like that doesn't affect outcome
	    if (last > number) {
	        return currentNumber - number;
	    } else {
	        return currentNumber + number;
	    }
	}
}