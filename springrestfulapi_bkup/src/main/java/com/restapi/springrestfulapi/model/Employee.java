package com.restapi.springrestfulapi.model;

import java.util.Date;

import javax.persistence.Column;
import javax.persistence.Entity;
import javax.persistence.EntityListeners;
import javax.persistence.Id;
import javax.persistence.JoinColumn;
import javax.persistence.ManyToOne;
import javax.persistence.Table;
import javax.persistence.Temporal;
import javax.persistence.TemporalType;
import javax.validation.constraints.NotNull;

import org.springframework.data.annotation.LastModifiedDate;
import org.springframework.data.jpa.domain.support.AuditingEntityListener;

import com.fasterxml.jackson.annotation.JsonCreator;
import com.fasterxml.jackson.annotation.JsonProperty;

@Entity
@Table(name="employee")
@EntityListeners(AuditingEntityListener.class)
public class Employee {

	@Id
	@Column(name = "`empId-35`", length=10)
	private String empId;
	
	@NotNull
	@Column(name="`empFirstName-35`", length=40)
	private String empFirstName;
	
	@NotNull
	@Column(name="`empLastName-35`", length=50)
	private String empLastName;
	
	@NotNull
	@Column(name="`empPosition-35`", length=50)
	private String empPosition;
	
	@NotNull
	@Temporal(TemporalType.TIMESTAMP)
	@LastModifiedDate
	@Column(name="`empStartDate-35`")
	private Date empStartDate;
	
	@NotNull
	@Column(name="`empSalary-35`", length=20)
	private Integer empSalary;
	
	@ManyToOne
	@JoinColumn(name="`depId-35`")
	private Department depId;

	public String getEmpNum() {
		return empId;
	}

	public void setEmpNum(String empId) {
		this.empId = empId;
	}

	public String getEmpFirstName() {
		return empFirstName;
	}

	public void setEmpFirstName(String empFirstName) {
		this.empFirstName = empFirstName;
	}

	public String getEmpLastName() {
		return empLastName;
	}

	public void setEmpLastName(String empLastName) {
		this.empLastName = empLastName;
	}

	public String getEmpPosition() {
		return empPosition;
	}

	public void setEmpPosition(String empPosition) {
		this.empPosition = empPosition;
	}

	public Date getEmpStartDate() {
		return empStartDate;
	}

	public void setEmpStartDate(Date empStartDate) {
		this.empStartDate = empStartDate;
	}

	public Integer getEmpSalary() {
		return empSalary;
	}

	public void setEmpSalary(Integer empSalary) {
		this.empSalary = empSalary;
	}

	public Department getEmpDep() {
		return depId;
	}

	public void setEmpDep(Department depId) {
		this.depId = depId;
	}

	public Employee() {}

	@JsonCreator
	public Employee(String empId, String empFirstName, String empLastName,
			String empPosition, Date empStartDate, Integer empSalary,
			 Department depId) {
		this.empId = empId;
		this.empFirstName = empFirstName;
		this.empLastName = empLastName;
		this.empPosition = empPosition;
		this.empStartDate = empStartDate;
		this.empSalary = empSalary;
		this.depId = depId;
	}
	
	

}
