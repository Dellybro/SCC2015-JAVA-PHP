import java.util.*;
import java.io.PrintStream;

public class Main{

	public static Scanner input = new Scanner(System.in);

	public static void main(String[] args){
		Menu menu1 = new Menu("My Menu");

		MenuItem item1 = new MenuItem(5, "add");
		item1.setChoice(1);
		menu1.add(item1);
		//item1.setEnabled(false);
		MenuItem item2 = new MenuItem(6, "delete");
		item2.setChoice(2);
		item2.setEnabled(false);
		menu1.add(item2);

		MenuItem item3 = new MenuItem(7, "troop");
		item3.setChoice(3);
		menu1.insert(0, item3);

		
		menu1.display(System.out);
		menu1.activate(System.out);

	}
}