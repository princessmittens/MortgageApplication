package com.brokerapi.Reposiroty;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.brokerapi.model.UsersAtBroker;

@Repository
public interface BrokerRepository extends JpaRepository<UsersAtBroker, Integer> {

}
