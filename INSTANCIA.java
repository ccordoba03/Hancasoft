/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package taxi;

/**
 *
 * @author Andres Felipe Martinez
}
public class picanto {
    
    public static void main(String[] args) { 

       Taxi chevete=new Taxi("BFN641",1994,"2000CC" ); 
       chevete.setMatricula("ABB645");
       chevete.setModelo(1994);
       chevete.setPotencia("2000cc");
       
	chevete.Acelerar();
        chevete.Frenar();
       
     System.out.print(chevete.getMatricula());