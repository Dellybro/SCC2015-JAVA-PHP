/*

Date: November 10th 2015
Purpose: LinkList Stack
Creator: Travis Delly

*/

import java.io.*;
import java.util.*;

/*
 * An <code>class LLIndex</code> object is used used to keep track of the 
 * front of the link list, the end of the link list, and the current 
 * location in the link list.
 */
class LLIndex {
   public LLNode head;          //points to the front of the list
   public LLNode tail;         //points to the rear of the list
   public LLNode current;     //this is the cursor
   public LLIndex() {} 
}

/*
 * <code>class LLNode</code> is used to instantiate objects that are
 * elements of as a doubly linked-list.  This is not a "generic" node
 * (i.e. it only stores references to String objects).
 */
class LLNode {
   public Object token;
   public LLNode next;
   public LLNode prev;
   public LLNode(Object token) { this.token = token; }
}

class LinkedList {
   private LLIndex list; 


   public void addNode(Object elem) {
      LLNode newNode = new LLNode(elem);
      if (list == null) {
         list = new LLIndex();
         list.head = list.tail = newNode;
         list.current = null;
      } else {     //add the new node - on the end
         list.tail.next = newNode;
         newNode.prev = list.tail;
         //newNode.next = null;   //set to null when instantiated
         list.tail = newNode;
      }

   }
   // puts an object on top of this stack...

   public Object deleteNode() throws StackEmptyException {
      try{
         if(list==null) throw new StackEmptyException("Empty Array");

         list.current = list.tail;

         LLNode objLast;

         if (list.head == list.tail) {        //list of length one

            objLast = list.head;
            list = null;

         } else if (list.current == list.tail) {

            list.tail = list.current.prev;
            objLast = list.tail.next;
            list.tail.next = null;
            list.current = null;

         } else if (list.current == list.head) {

            list.head = list.current.next;
            objLast = list.head.prev;
            list.head.prev = null;
            list.current = list.head;

         } else {
            list.current.prev.next  = list.current.next;
            list.current.next.prev = list.current.prev;
            objLast = list.current;
            list.current = list.current.next;

         }
         return objLast.token;
      }catch(StackEmptyException e){
         System.out.println("Caught Exception: "+e);
         return null;
      }
   }
      // removes the top object from this stack...

   public Object top() throws StackEmptyException {
      try{
         System.out.println(list);
         if(list==null) throw new StackEmptyException("Empty Array");

         list.current = list.tail;
         System.out.println(list.current.token);
         return list.current.token;
      }catch(StackEmptyException e){
         System.out.println("Caught Exception: "+e);
         return null;
      }
   }
      // returns, but does not remove, the top object from this stack...
   public int size(){
      //Return 0 if list is null.
      if(list == null){
         return 0;
      } else {
         //x = size;
         int x = 0;
         list.current = list.head;
         while(list.current != null){
            x++;
            list.current = list.current.next;
         }
         return x;
      }
   }
   public String insertNode(int index, String token)throws StackEmptyException{
      if(size() < index || list == null){
         try{
            throw new StackEmptyException("Index out of bounds");
         }catch(StackEmptyException e){
            return e.toString();
         }
      }
      LLNode newNode = new LLNode(token);

      list.current = list.head;

      //This is the real insertion Algorithm, but i can't figure out why this isn't working

      // for (int x = 0; x <= index; x++) {
      //    list.current.prev = list.current;
      //    list.current = list.current.next;
      //    System.out.println(list.current.token);
      // }
      // list.current = newNode;

      //Create an array to hold the popped nodes.
      ArrayList<String> poppedNodes = new ArrayList<String>();


      //Delete nodes until position = index
      for(int x = size(); x > index; x--){
         poppedNodes.add((String)deleteNode());
      }
      //Add token into popped nodes
      poppedNodes.add((String)token);

      //Add poppednodes back to current list in reverse order
      for(int x = poppedNodes.size()-1; x >= 0; x--){
         addNode(poppedNodes.get(x));
      }

      //Return 
      return "Added " + token + " to Position: " + index;

   }
   public Object print() throws StackEmptyException {

      try {

         if(list==null) throw new StackEmptyException("Empty Array");
         String returnString = "Link List Contents: [";

         list.current = list.head;
         while (list.current != null) {
            returnString += (list.current.token+",");
            list.current = list.current.next;
            if(list.current == null){
               returnString = returnString.substring(0,returnString.length()-1)+']';
            }
         }
         
         return returnString; 
      }catch(StackEmptyException e){
         System.out.println("Caught Exception: "+e);
         return "[]";
      }

   }
}

class StackEmptyException extends Exception {
   public StackEmptyException(String m){ super(m); }
}

public class Menu {

   public static Scanner input = new Scanner(System.in);


   public static void main(String[] argv) throws StackEmptyException{
      LinkedList ll = new LinkedList();

      while(true){
         showMenu();
         try{
            char userInput = input.nextLine().charAt(0);

            switch(userInput){
               case '1':
                  System.out.print("What would you like to add: ");
                  String newInput = input.nextLine();
                  ll.addNode(newInput);
                  break;
               case '2':
                  System.out.println("deleteNodeping: " + ll.deleteNode());
                  break;
               case '3':
                  System.out.println("Top of stack: " + ll.top());
                  break;
               case '4':
                  System.out.println("Size of stack: " + ll.size());
                  break;
               case '5':
                  System.out.println(ll.print());
                  break;
               case '6':

                  System.out.println(ll.insertNode(userInputInteger(), userStringInput()));
                  break;
               case '7':
                  System.out.println("Exiting...");
                  System.exit(0);
                  break;
               default: 
                  System.out.println("no choice found");
                  break;
            }
         }catch(StringIndexOutOfBoundsException e){
               System.out.println("Try Again");
         }
      }
   }
   public static String userStringInput(){
      System.out.println("What would you like to insert");
      while(true){
         try{
            String in = input.nextLine();
            return in;
         }catch(InputMismatchException e){
            System.out.println("Try Again");
         }
      }
   }
   public static int userInputInteger(){
      System.out.println("Insert into what position?");

      while(true){
         try{
            int in = input.nextInt();
            input.nextLine();
            return in;
         }catch(InputMismatchException e){
            System.out.println("Try Again");
            input.nextLine();
         }
      }
   }
   public static void showMenu(){
      System.out.println("Stack Test Menu\n" +
                           "==============\n" +
                           "1) Add Node\n" +
                           "2) Delete Node\n" +
                           "3) Top\n" +
                           "4) Size\n" +
                           "5) Print\n" +
                           "6) Insert at index\n" +
                           "7) Exit");
   }
}