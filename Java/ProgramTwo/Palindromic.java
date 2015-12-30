/*

Purpose: To Learn about palindromic patterns in progamming
Creator: Travis Delly
Date: Tuesday Sept 15th.

*/

import java.util.*;

public class Palindromic{
	public static void main(String[] args){

		for (int x = 10; x <= 10000; x++) {
			if(checkIfPalindrome(x)){//Check for palindrome
				ArrayList<Integer> listOfMulitplies = getMulitpliesIfAllPalindrome(x);//Get Multiple list of all palindromes

				if(listOfMulitplies.size() > 2){//Check if prime number By this point only prime numbers will have more than 2 numbers in their list.
					System.out.println(x + " (" + makeOutput(listOfMulitplies) + ")");
				}
			}
		}
	}

	public static String makeOutput(ArrayList<Integer> listOfMulitplies){
		String output = new String();

		for (int i = 0; i < listOfMulitplies.size(); i++) {
			if(i == listOfMulitplies.size()-1){
				output+=listOfMulitplies.get(i);
			} else {
				output+= listOfMulitplies.get(i)+",";
			}
		}

		return output;
	}

	public static ArrayList<Integer> getMulitpliesIfAllPalindrome(Integer number){

		ArrayList<Integer> listOfMulitplies = new ArrayList<Integer>();
		for(Integer x = 1; x <= number; x++){
			if(number%x == 0){
				if(checkIfPalindrome(x)){//Check if the number is a palindrome
					listOfMulitplies.add(x);//If it is a palindrome continue to next step
				} else {
					return new ArrayList<Integer>(); //else return list with empty values to value next test
				}
			}
		}
		return listOfMulitplies;

	}

	public static Boolean checkIfPalindrome(Integer number){
		String reverse_number = new String();

		for (int x = number.toString().length()-1; x >= 0; x--) 
			reverse_number += number.toString().charAt(x);

		if(Integer.parseInt(reverse_number) == number){
			return true;
		} else {
			return false;
		}
	}
}