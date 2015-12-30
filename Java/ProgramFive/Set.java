/*

Date: October 7th 2015
Updated Date: October 13th 2015
	Updated method: Difference/Intersection
Purpose: Implement Set method
Creator: Travis Delly

*/

import java.util.*;

public class Set extends Vector<Object> implements Cloneable{

	Set(){
		setSize(32);
	}

	Set(int capacity){
		setSize(capacity);
	}


	public boolean isMember(Object element){
		for (int x = 0; x < size(); x++) {
			if(get(x) == element){
				return true;
			}
		}
		return false;
	}

	public boolean isEmpty(){
		for (int x = 0; x < size(); x++) {
			if(get(x) != null){
				return false;
			}
		}
		return true;
	}

	public boolean isSubset(Set other){

		Set set1 = this.sortSet();
		Set set2 = other.sortSet();

		if(set1.size() >= set2.size()){
			for (int x = 0; x < set2.size(); x++) {
				if(!(set1.get(x) == set2.get(x))){
					return false;
				}
			}
		} else {
			return false;
		}
		return true;
	}


	@Override
	public int size(){
		int size = 0;
		for (int x = 0; x < capacity(); x++ ) {
			if(get(x) == null){

			}else{
				size++;
			}
		}
		return size;
	}

	public int capacity(){
		return super.size();
	}

	public Set union(Set other){

		Set newSet = new Set();


		for (int x = 0; x < other.size(); x++) {
			if(other.get(x) == null){
				break;
			} else {
				newSet.add(other.get(x));
			}
		}

		for (int x = 0; x < size(); x++) {
			if(get(x) == null){
				break;
			} else {
				newSet.add(get(x));
			}
		}



		return newSet;
	}

	public Set intersection(Set other){
		Set returnSet = new Set(0);
		for (int x = 0; x < size(); x++) {
			for (int y = 0; y < other.size(); y++) {
				if(get(x) == other.get(y)){
					returnSet.add(get(x));
					break;
				}
			}
			if(other.isMember(get(x))){
			}
		}
		return returnSet;
	}

	public Set difference(Set other){

		Set returnSet = new Set(0);

		for (int x = 0; x < size(); x++) {
			if(!other.isMember(get(x))){
				System.out.println("this x: " + get(x));
				returnSet.add(get(x));
			}
			if(!isMember(other.get(x))){
				System.out.println("that x: " + other.get(x));
				returnSet.add(other.get(x));
			}
		}
		return returnSet;
	}

	@Override
	public boolean add(Object element){
		try{
			boolean added = false;
			for (int x = 0; x < capacity(); x++) {
				if(get(x) == null){
					set(x, element);
					added = true;
					break;
				}
			}
			if(!added){
				super.add(element);
			}
			return true;
		}catch(Exception e){
			System.out.println("Failed to add" + element);
			return false;
		}
	}

	public void clear(){
		super.clear();
	}

	public String toString(){

		String finalString = "[";
		for (int x = 0; x < size(); x++) {
			if(get(x) != null){
				finalString += get(x) + ",";
			} else {
				break;
			}
		}
		if(finalString.length() > 1){
				finalString = finalString.substring(0, finalString.length()-1);
		}
		finalString+="]";
		return finalString;
	}

	public Set sortSet(){

		Set newSet = (Set)this.clone();

		for (int x = 0; x < newSet.size()-1; x++) {
			//Break if null is found.
			if(newSet.get(x+1) == null)
				break; 

			for (int y = 0; y < newSet.size()-1; y++) {
				//Break if null is found.
				if(newSet.get(y+1) == null)
					break; 

				//Grab both positions as integers.
				int position1 = (int)newSet.get(y);
				int position2 = (int)newSet.get(y+1);

				//Check which position is greater than the other if one is greater do somethign.
				if(position1 > position2){

					newSet.set(y, position2);
					newSet.set(y+1, position1);
				}
			}
		}

		return newSet;
	}

	public boolean equals(Set other){

		Set set1 = this.sortSet();
		Set set2 = other.sortSet();

		if(set1.size() == set2.size()){
			for (int x = 0; x < set1.size(); x++) {
				if(!(set1.get(x) == (set2.get(x)))){
					return false;
				}
			}
			return true;
		} else {
			return false;
		}
	}
}