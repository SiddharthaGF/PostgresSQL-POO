/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package crud;

import java.beans.PropertyChangeListener;
import java.beans.PropertyChangeSupport;
import java.io.Serializable;
import javax.persistence.Basic;
import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.Id;
import javax.persistence.NamedQueries;
import javax.persistence.NamedQuery;
import javax.persistence.Table;
import javax.persistence.Transient;

/**
 *
 * @author lives
 */
@Entity
@Table(name = "estudiante", catalog = "postgres", schema = "public")
@NamedQueries({
    @NamedQuery(name = "Estudiante.findAll", query = "SELECT e FROM Estudiante e")
    , @NamedQuery(name = "Estudiante.findByCedula", query = "SELECT e FROM Estudiante e WHERE e.cedula = :cedula")
    , @NamedQuery(name = "Estudiante.findByNombrePersona", query = "SELECT e FROM Estudiante e WHERE e.nombrePersona = :nombrePersona")
    , @NamedQuery(name = "Estudiante.findByApellidoPersona", query = "SELECT e FROM Estudiante e WHERE e.apellidoPersona = :apellidoPersona")
    , @NamedQuery(name = "Estudiante.findByDireccion", query = "SELECT e FROM Estudiante e WHERE e.direccion = :direccion")
    , @NamedQuery(name = "Estudiante.findByCodigoEstudiante", query = "SELECT e FROM Estudiante e WHERE e.codigoEstudiante = :codigoEstudiante")
    , @NamedQuery(name = "Estudiante.findByCodigoCarrera", query = "SELECT e FROM Estudiante e WHERE e.codigoCarrera = :codigoCarrera")})
public class Estudiante implements Serializable {

    @Transient
    private PropertyChangeSupport changeSupport = new PropertyChangeSupport(this);

    private static final long serialVersionUID = 1L;
    @Column(name = "cedula")
    private String cedula;
    @Column(name = "nombre_persona")
    private String nombrePersona;
    @Column(name = "apellido_persona")
    private String apellidoPersona;
    @Column(name = "direccion")
    private String direccion;
    @Id
    @Basic(optional = false)
    @Column(name = "codigo_estudiante")
    private Integer codigoEstudiante;
    @Column(name = "codigo_carrera")
    private Integer codigoCarrera;

    public Estudiante() {
    }

    public Estudiante(Integer codigoEstudiante) {
        this.codigoEstudiante = codigoEstudiante;
    }

    public String getCedula() {
        return cedula;
    }

    public void setCedula(String cedula) {
        String oldCedula = this.cedula;
        this.cedula = cedula;
        changeSupport.firePropertyChange("cedula", oldCedula, cedula);
    }

    public String getNombrePersona() {
        return nombrePersona;
    }

    public void setNombrePersona(String nombrePersona) {
        String oldNombrePersona = this.nombrePersona;
        this.nombrePersona = nombrePersona;
        changeSupport.firePropertyChange("nombrePersona", oldNombrePersona, nombrePersona);
    }

    public String getApellidoPersona() {
        return apellidoPersona;
    }

    public void setApellidoPersona(String apellidoPersona) {
        String oldApellidoPersona = this.apellidoPersona;
        this.apellidoPersona = apellidoPersona;
        changeSupport.firePropertyChange("apellidoPersona", oldApellidoPersona, apellidoPersona);
    }

    public String getDireccion() {
        return direccion;
    }

    public void setDireccion(String direccion) {
        String oldDireccion = this.direccion;
        this.direccion = direccion;
        changeSupport.firePropertyChange("direccion", oldDireccion, direccion);
    }

    public Integer getCodigoEstudiante() {
        return codigoEstudiante;
    }

    public void setCodigoEstudiante(Integer codigoEstudiante) {
        Integer oldCodigoEstudiante = this.codigoEstudiante;
        this.codigoEstudiante = codigoEstudiante;
        changeSupport.firePropertyChange("codigoEstudiante", oldCodigoEstudiante, codigoEstudiante);
    }

    public Integer getCodigoCarrera() {
        return codigoCarrera;
    }

    public void setCodigoCarrera(Integer codigoCarrera) {
        Integer oldCodigoCarrera = this.codigoCarrera;
        this.codigoCarrera = codigoCarrera;
        changeSupport.firePropertyChange("codigoCarrera", oldCodigoCarrera, codigoCarrera);
    }

    @Override
    public int hashCode() {
        int hash = 0;
        hash += (codigoEstudiante != null ? codigoEstudiante.hashCode() : 0);
        return hash;
    }

    @Override
    public boolean equals(Object object) {
        // TODO: Warning - this method won't work in the case the id fields are not set
        if (!(object instanceof Estudiante)) {
            return false;
        }
        Estudiante other = (Estudiante) object;
        if ((this.codigoEstudiante == null && other.codigoEstudiante != null) || (this.codigoEstudiante != null && !this.codigoEstudiante.equals(other.codigoEstudiante))) {
            return false;
        }
        return true;
    }

    @Override
    public String toString() {
        return "crud.Estudiante[ codigoEstudiante=" + codigoEstudiante + " ]";
    }

    public void addPropertyChangeListener(PropertyChangeListener listener) {
        changeSupport.addPropertyChangeListener(listener);
    }

    public void removePropertyChangeListener(PropertyChangeListener listener) {
        changeSupport.removePropertyChangeListener(listener);
    }
    
}
