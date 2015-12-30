import java.io.*;       // using the File class

/**
 * <p> 
 * This application demonstrates interfaces.  
 * </p>
 *
 * <p> 
 * The program uses the <code>File</code> class which represents a 
 * filename.  This class allows the filename to be manipulated and it 
 * also provides methods that interact with the underlying file system. 
 * </p>
 *
 * @creator gdt
 * @created 01999.09.20
 * @version 02014.09.21
 * @see File
 */

public class InterfaceExample {

   public static void main(String[] argv) {
      FileInterface f = null;
      for (int i = 0; i < argv.length; i++) {
         if (argv[i].endsWith(".class"))
            f = new BinaryFile(argv[i]);
         else
            f = (FileInterface) new TextFile(argv[i]);
         if (f.fileAccess())
            f.fileViewer();
      }
   }
}

class BinaryFile extends File implements FileInterface {

   public BinaryFile(String fileName) { 
      super(fileName);   //initialize the File portion of the object
   }

   public void fileViewer() {
      System.out.println("view BinaryFile " + getName());
   }

   public boolean fileAccess() { 
      return canRead() && length() > 0; 
   }
}

class TextFile extends File implements FileInterface {

   public TextFile(String fileName) { 
      super(fileName);   //initialize the File portion of the object
   }

   public void fileViewer() {
      System.out.println("view TextFile " + getName());
   }
   public boolean fileAccess() {
      return isFile() && canRead() && length() > 0;
   }
}

// If you have a set of interfaces that numerous classes implement,
// then they can be grouped into a single interface...
//
interface FileInterface extends FileViewer, FileAccess {}

// Each unique file type has its own viewer logic.
//
interface FileViewer {
   public void fileViewer();
}

// Access requirements may vary between file types.  In this example,
// TextFile must be a file, but BinaryFile could be a directory.
//
interface FileAccess {
   public boolean fileAccess();
}

/*
 * By convention, many  interface  names end in "-able" or "-ible" (and
 * sometimes "-er").  One style is to start all  interface  names with "I."
 * For example:  IFileViewer  IFileAccess  IFileHandler
 */