import java.io.*;
import java.util.*;

/**
 * <code>public class TestExceptions</code> is an overly-complex
 * program used to demonstrate <code>Exceptions</code>.  Numerous
 * command-line options are used to cause various and sundry types
 * of exceptions.
 *
 * @creator gdt
 * @Editor Travis Delly
 * @created 02000.04.25
 * @updated 02013.11.20  no code was changed
 * @updated @2015.sept.29 updated code for homework purposes, menu rather thans commandline args
 * @used csc260, csc210, csc200, csc110 (fall'13)
 */

public class TestExceptions {

   public static Scanner input = new Scanner(System.in);

   public static void makeMenu(){
      System.out.println("Press some button");
      System.out.println("=================");
      System.out.println("1) force FloatingPointDivideByZeroException");
      System.out.println("2) execute a floating-point divide by 0");
      System.out.println("3) force a NullPointerException");
      System.out.println("4) force a DummyRuntimeException");
      System.out.println("5) force a runtime exception to be thrown up");
      System.out.println("6) force exception to be thrown up");
      System.out.println("7) force exception from finally block");
      System.out.println("8) Exit");
      

   }

   public static void main(String[] argv) {

      Boolean inFinallyBlock = true;

      while(true){
         makeMenu();

         try{
            Character choice = input.nextLine().charAt(0);

            if(choice == '1'){
               divide(0);
            } else if(choice == '2'){
               divide('n');
            } else if(choice == '3'){
               nullPointer();
            } else if(choice == '4'){
               dummyRuntime(260);
            } else if(choice == '5'){
               ThrowUp t = new ThrowUp();
               t.throwUp('r');
            } else if (choice == '6'){
               ThrowUp t = new ThrowUp();
               t.throwUp('e');
            } else if(choice == '7'){
               ThrowUp t = new ThrowUp();
               t.throwUp('E');
            }else if (choice == '8'){
               System.out.println("EXITING");
               inFinallyBlock = false;
               break;
            }else{
               throw new GoofyUserException("Goofy user! Learn to follow instructions.");
            }
         }catch(FloatingPointDivideByZeroException e1) {
            // getMessage() and printStackTrace() are Throwable methods
            System.out.println("getMessage(): " + e1.getMessage());
            e1.printStackTrace(System.out);
         } catch(NullPointerException e2) {
            e2.printStackTrace();  // goes to standard error
         } catch(DummyRuntimeException e3) {
            System.out.println(e3.getMessage() + "; id=" + e3.id);
         }catch (EOFException e4) {
            System.out.println("in EOFException catch block of the main()");
            e4.printStackTrace();
         }catch(GoofyUserException e){
            System.out.println(e);
         }catch(Exception e) {
            System.out.print("catching everything");
            if (e instanceof IllegalArgumentException)
               System.out.print(" (IllegalArgumentException)");
            System.out.println();
            e.printStackTrace();
         }finally { 
            if(inFinallyBlock){
               System.out.println("in finally block"); }
            }
      }
   }


   private static void 
   divide(int denom) throws FloatingPointDivideByZeroException {
      if (denom == 0) 
         throw new FloatingPointDivideByZeroException("divide by 0");
      // floating-point divide-by-0 allowed
      System.out.println("1997.10 / 0 equals " + 1997.1 / 0d);
   }

   private static void 
   dummyRuntime(int i) /* throws DummyRuntimeException */ {
      throw new DummyRuntimeException("dummyRuntime", i);
   }

   private static void 
   nullPointer() throws Exception /* not really, but maybe in future */ {
      String s = null;
      if (s.equals("csc260")) ;
   }
}

class FloatingPointDivideByZeroException extends Exception {
   public FloatingPointDivideByZeroException(String m) { super(m); }
}

class DummyRuntimeException extends RuntimeException {
   public int id;
   public DummyRuntimeException(String m, int i) { super(m); id = i; }
}

class GoofyUserException extends Exception {
   public GoofyUserException(String m) { super(m); }
}

class ThrowUp {
   public void 
   throwUp(char c) throws EOFException, Exception { 
      try { 
         if (c == 'r')
            throw new IllegalArgumentException("throw up"); 
         else
            throw new EOFException("throw up");
      } catch(EOFException e) {
         System.out.println("in ThrowUp.throwUp()");
         e.printStackTrace();
         throw e;
      } finally {
         System.out.println("in ThrowUp.throwUp().finally");
         if (c == 'E')  //cause an exception to get lost
            throw new Exception();
      }
   }
}

/*
 Java's exception handling based on C++ (which was based on ADA)...
 "termination" (versus resumption) exception handling model is used 
     (error is so critical there's no way to get back to where the 
      exeception occurred)...
 non-RuntimeExceptions are considered "checked" exceptions -- if you
     call a method that throws a checked exception, then you must catch
     it or throw it (and, the method must be called from a try block)...
 generally, you extend Exception -- not RuntimeException...
 checked Exceptions are forced to be correct at compile-time...
 if you override a method that throws A and B, then your override
     method can only throw A and B (i.e. it could not also throw C)...
 finally block used to set something other than memory back to its
     original state (e.g. close a file)...
*/