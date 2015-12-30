public class Rot13 {
   public static void main(String[] argv) {
      char ch = ' ';
      System.out.println("type text and press ENTER...");
      while (true) {    
         try {  
            ch = (char)System.in.read();  
         } catch(java.io.IOException e) {  
            System.out.println("IOException caught...");
            break; 
         }
         if (ch == '\n') 
				break;
         if (Character.isUpperCase(ch)) 
				ch += (ch < 'M') ? 13 : -13;
         else if (Character.isLowerCase(ch)) 
            ch += (ch < 'm') ? 13 : -13;
         else if (Character.isDigit(ch))
            ch += (ch < '5') ? 5 : -5;
         System.out.print(ch);
      }
      System.out.println();
   }
}