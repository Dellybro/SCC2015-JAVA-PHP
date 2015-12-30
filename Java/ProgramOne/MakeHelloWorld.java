import java.util.*;
import java.io.*;
import java.text.*;

/*
* This Java application prints the phrase hello, world to the standard output stream created a new file named Helloworld
* Which can be compiled and ran
*
* @Creator Travis Delly
* @Created 2015.09.08
* @updated 2015.09.08 - Added Comment block to generated and file.
*/

public class MakeHelloWorld {

	public static PrintStream stdout = System.out; //Get what system out is at runtime.

	public static void main(String[] args) {
		MakeProgram("HelloWorld.java");

	}





	public static void MakeProgram(String programName){
		try {
         	//Create and Set O


         	PrintStream o = new PrintStream(new BufferedOutputStream(new FileOutputStream(programName)));

         	System.out.println("hello");


         	System.setOut(o);

         	HelloWorld();

			//Close and Reset standard output
			o.close();
			System.setOut(stdout);
      		System.out.println("Wrote File, " + programName + "\nClosing file\nResetting PrintStream");

      	} catch (IOException e) { 
      		System.exit(1); 
      	}
	}


	public static void HelloWorld(){
		//Create Date for generator
		Date date = new Date();
		SimpleDateFormat sdf = new SimpleDateFormat("yyyy/MM/dd HH:mm");

		//Create program.
		System.out.println("/*\n*This Java application prints the phrase hello, world to the \n* standard output stream. This code was program generated\n*\n* Creator Travis Delly \n* Generated " + sdf.format(date) + "\n*/");
		System.out.printf("public class HelloWorld {\n\tpublic static void main(String[] args) {\n\t\tString s = \"hello, world\"; \n\t\tSystem.out.println(s);\n\t}\n}");

	}
}