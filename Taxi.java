/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package taxi;

/**
 *
 * @author CAMILO CORDOBA
 */
public class Taxi {

 private String matricula;
 private int    modelo;
 private String potencia;
 
 
 // inicialisacion de la clase con constructor-monica
 public Taxi(String matricula,int modelo,String potencia){
 
 this.matricula=matricula;
 this.modelo=modelo;
 this.potencia=potencia;

  
 // metodos get and set-camilo
public void setMatricula(
String matricula){

  this.matricula=matricula;
    
}

public void setModelo(int modelo){
this.modelo=modelo;
}

public void setPotencia(String potencia){
this.potencia=potencia;
}
 
  
  
 }   

}
