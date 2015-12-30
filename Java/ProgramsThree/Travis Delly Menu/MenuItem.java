
/*
 * This program was written to help the menu have items!
 *
 * @creator Travis Delly
 * @created 02014.09.25
 */

import java.util.*;

public class MenuItem{

	private int choice = 0;
	private int id = 0;
	private Boolean enabled = true;
	private String label = new String();

	public String runItem(){
		return label + "...";
	}

	public MenuItem(int theId, String theLabel){
		id = theId;
		choice = theId;
		label = theLabel;
	}
	public String getLabel(){
		
		return label;
	}
	public void setChoice(int theChoice){
		choice = theChoice;
	}
	public int getChoice(){
		return choice;
	}
	public int getId(){
		return id;
	}
	public void setEnabled(Boolean state){
		enabled = state;
	}
	public Boolean getEnabled(){
		return enabled;
	}
}