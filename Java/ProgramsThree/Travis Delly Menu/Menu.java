/*
 * This program was written to help make the menuItem class do stuff!
 *
 * @creator Travis Delly
 * @created 02014.09.25
 */



import java.util.*;
import java.io.PrintStream;

public class Menu{
	private String title = new String();
	private char underLineChar = '=';
	private ArrayList<MenuItem> items = new ArrayList<MenuItem>();
	private int id = 0;
	public static char DFLT_UNDERLINE_CHAR = '=';

	public static Scanner input = new Scanner(System.in);


	public Menu(String theTitle){
		title = theTitle;
	}

	public void add(MenuItem menuItem){
		items.add(menuItem);
	}
	public void insert(int pos, MenuItem menuItem){
		items.add(pos, menuItem);

	}
	public void remove(MenuItem menuItem){
		items.remove(menuItem);
	}
	public void setTitle(String theTitle){
		title = theTitle;
	}
	public char getUnderlineChar(){
		return underLineChar;
	}
	public void setUnderlineChar(char charSet){
		underLineChar = charSet;
	}
	public ArrayList<MenuItem> getItems(){
		return items;
	}

	public void display(PrintStream out){
		int disabledAmmount = 0;

		out.println(title);
		for (int x = 0; x < title.length(); x++) {
			out.print(underLineChar);
		}
		out.println("");
		for (int x = 0; x < items.size(); x++) {
			MenuItem item = items.get(x);
			if(item.getEnabled()){
				out.println(item.getChoice()+") " + item.getLabel());
			}else{
				disabledAmmount++;
				out.println("*) " + item.getLabel());
			}
		}
		
	}
	public String getTitle(){
		return title;
	}

	public int activate(PrintStream out){	
		Boolean continueOn = false;
		int decision = 0;

		display(System.out);
		System.out.print("Chose an option - ");
		while(continueOn == false){

			try{
				decision = input.nextInt();
				for (int x = 0; x < items.size(); x++) {

					if(items.get(x).getChoice() == decision && items.get(x).getEnabled()){
						display(System.out);
						System.out.println("Id of MenuItem: " + items.get(x).getId());
						continueOn = true;
						x = items.size();
					} 
				}
				if(continueOn == false){
					display(System.out);
				}
			}catch(InputMismatchException e){
				System.out.println("Numeric only");
				input.next();
				System.out.print("Chose an option - ");

			}
		}
		return decision;
	}
}