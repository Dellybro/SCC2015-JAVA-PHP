// password    123456      12345678    qwerty
//      baseball    football    letmein     111111      
//      superman    master      harley

/*

Creator: Travis Delly
Date: October 27th

*/

import java.util.*;

public class PassCheck{

	private static int score;
	private char[] myChars;
	public static String[] wordList = {"password",  "123456", "12345678", "qwerty", "baseball", "football", "letmein", "111111", "superman", "master", "harley"};
	public static Scanner input = new Scanner(System.in); 

	public static void main(String[] args){

		while(true){
			score = 0;
			System.out.println("Type exit to an exit");
			System.out.print("Enter a Password: ");
			String newInput = input.nextLine();

			if(newInput.equals("exit")){
				break;
			}
			char[] charArray = newInput.toCharArray();

			checkForAddScore(charArray);
			checkForSubtractScore(charArray);

			System.out.println("The Password you entered was: " + newInput+ " With a score of : " +score);
		}

	}

	public static void checkForSubtractScore(char[] charArray){
		for (int x = 0; x < wordList.length; x++) {
			if(wordList[x].length() != charArray.length){
				continue;
			} else {
				boolean checkBackwards = true;
				for (int i = 0; i < charArray.length; i++) {
					if(i == charArray.length-1){
						if(charArray[i] == wordList[x].charAt(i)){
							checkBackwards = false;
							System.out.println("To obvious minus 5");
							score-=5;
						}
					} else {
						if(charArray[i] != wordList[x].charAt(i)){
							break;
						}
					}
				}
				if(checkBackwards){
					for (int i = 0; i < charArray.length; i++) {
						if(i == charArray.length-1){
							if(charArray[i] == wordList[x].charAt(charArray.length-i-1)){
								System.out.println("To obvious minus 5");
								score-=5;
							}
						} else {
							if(charArray[i] != wordList[x].charAt(charArray.length-i-1)){
								break;
							}
						}
					}
				}
			}
		}

	}

	public static void checkForAddScore(char[] charArray){

		Boolean hasUpperCase = false;
		Boolean hasDigit = false;
		Boolean hasLowerCase = false;
		Boolean hasPunctuation = false;
		Boolean hasIntervalOne = false;
		Boolean hasIntervalTwo = false;

		if(charArray.length > 8){
			System.out.println("Size greater than 8");
			score+=2;
		} else if(charArray.length > 6){
			System.out.println("Size between than 6-8");
			score++;
		}

		for (int x = 0; x < charArray.length; x++) {

			if(charArray[x] >= 'A' && charArray[x] <= 'Z' && !hasUpperCase){
				System.out.println("Position " + x + " is uppercase");
				hasUpperCase = true;
				score++;
			}
			if(charArray[x] >= '!' && charArray[x] <= '/' && !hasIntervalOne){
				System.out.println("Position " + x + " is in interval one");
				hasIntervalOne = true;
				score++;
			}
			if(charArray[x] >= '[' && charArray[x] <= '_' && !hasIntervalTwo){
				System.out.println("Position " + x + " is in interval Two");
				hasIntervalTwo = true;
				score++;
			}
			if(charArray[x] >= 'a' && charArray[x] <= 'z' && !hasLowerCase){
				System.out.println("Position " + x + " is lowercase");
				hasLowerCase = true;
				score++;
			}
			if(Character.isDigit(charArray[x]) && !hasDigit){
				System.out.println("Position " + x + " is digit");
				hasDigit = true;
				score++;
			}
		}
	}
}