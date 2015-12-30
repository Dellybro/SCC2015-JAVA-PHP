/*

Date: October 7th 2015
Updated Date: October 13th 2015
Purpose: Implement Set method
Creator: Travis Delly

*/


import java.util.*;

public class TestExample{
	public static void main(String[] args){

		//Ret newRet = new Ret();

		//newRet.add(5);

		//System.out.println(newRet);

		Set mySet = new Set();

		// mySet.add(5);
		// mySet.add(3);
		// mySet.add(2);
		// mySet.add(5);
		// mySet.add(7);
		// mySet.add(5);

		mySet.add(5);
		mySet.add(10);
		mySet.add(15);
		mySet.add(20);
		mySet.add(25);
		mySet.add(5);
		mySet.add(10);
		mySet.add(15);
		mySet.add(20);
		mySet.add(25);

		Set otherSet = new Set(50);

		// otherSet.add(5);
		// otherSet.add(1);
		// otherSet.add(2);
		// otherSet.add(5);

		otherSet.add(5);
		otherSet.add(10);
		otherSet.add(15);
		otherSet.add(20);
		otherSet.add(5);
		otherSet.add(10);
		otherSet.add(15);
		otherSet.add(20);

		otherSet.sortSet();


		System.out.println("Myset: " + mySet.toString());

		System.out.println("otherset: " + otherSet.toString());

		System.out.println("Union: " + mySet.union(otherSet));

		System.out.println("Subset1: " + mySet.isSubset(otherSet));

		System.out.println("Subset2: " + otherSet.isSubset(mySet));

		System.out.println("Difference: " + mySet.difference(otherSet));

		System.out.println("Intersection: " + mySet.intersection(otherSet));

		System.out.println("To String: " + mySet.toString());

		System.out.println("Is empty: " + mySet.isEmpty());

		System.out.println("Size of: " + mySet.size());
	
		otherSet.add(25);
		otherSet.add(25);
		System.out.println("Add 25 to otherSet twice");
		System.out.println("Otherset should now equal myset: " + mySet.equals(otherSet));

		mySet.clear();

		System.out.print("After clear String: ");
		System.out.println(mySet.toString());


		System.out.print("After Clear is Empty?: ");
		System.out.println(mySet.isEmpty());


	}
}