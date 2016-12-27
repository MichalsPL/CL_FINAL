<?php

    namespace ContactsBundle\Controller;

    use ContactsBundle\Entity\Address;
    use ContactsBundle\Entity\Person;
    use ContactsBundle\Entity\Email;
    use ContactsBundle\Entity\Telephone;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
    use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
    use Symfony\Bundle\FrameworkBundle\Controller\Controller;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

    class PersonController extends Controller {

        public function CreateFormular(Person $person) {

            $form = $this->createFormBuilder($person)
                    ->add('name')
                    ->add('surname')
                    ->add('description', null, array( 'required' => false ))
                    ->add('save', 'submit', array('label' => 'zatwierdź'))
                    ->getForm();
            return $form;
        }

        /**
         *
         * @Route("/new", name="new_form")
         * @Method({"GET"})
         */
        public function CreateFormAction() {
            $person = new Person;
            $form = $this->CreateFormular($person);
            return $this->render('ContactsBundle:PersonController:create_form.html.twig', array(
                        'form' => $form->createView(),
                        'person' => true
            ));
        }

        /**
         * @Route("/new", name="new")
         * @Method({"POST"})
         */
        public function CreateNewAction(Request $request) {
            $person = new Person;
            $form = $this->CreateFormular($person);
            $form->handleRequest($request);
            if ($form->isValid()) {
                $person = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($person);
                $em->flush();
                $message = "dodałeś nową osobę";
            } else {
                $message = " wystąpił błąd osoba nie została dodana";
            }
            return $this->render('ContactsBundle:PersonController:create_new.html.twig', array(
                        'message' => $message,
                        'person' => $person,
            ));
        }

        public function Addresses($id) {
            $repository = $this->getDoctrine()->getRepository('ContactsBundle:Address');
            $em = $this->getDoctrine()->getManager();
            $query = $em->createQuery(
                    'SELECT a FROM ContactsBundle:Address a WHERE a.person = ' . $id
                    );
            $addresses = $query->getResult();
            return $addresses;
        }

        public function Telephones($id) {
            $repository = $this->getDoctrine()->getRepository('ContactsBundle:Telephone');
            $em = $this->getDoctrine()->getManager();
            $query = $em->createQuery(
                    'SELECT t FROM ContactsBundle:Telephone t WHERE t.person = ' . $id
                    );
            $telephones = $query->getResult();
            return $telephones;
        }

        public function Emails($id) {
            $repository = $this->getDoctrine()->getRepository('ContactsBundle:Email');
            $em = $this->getDoctrine()->getManager();
            $query = $em->createQuery(
                    'SELECT e FROM ContactsBundle:Email e WHERE e.person = ' . $id
                    );
            $emails = $query->getResult();
            return $emails;
        }

        /**
         * @Route("/{id}/modify", name="modify_form")
         * @Method({"GET"})
         */
        public function CreateModifyFormAction($id) {

            $repository = $this->getDoctrine()->getRepository('ContactsBundle:Person');
            $person = $repository->findOneById($id);
            $name = $person->getName();
            $surname = $person->getSurname();
            $description = $person->getDescription();
            
            $form = $this->CreateFormular($person);
            $addresses = $this->Addresses($id);
            $telephones = $this->Telephones($id);
            $emails = $this->Emails($id);

            return $this->render('ContactsBundle:PersonController:create_modify_form.html.twig', array(
                        'form' => $form->createView(),
                        'person' => $person,
                        'addresses' => $addresses,
                        'telephones' => $telephones,
                        'emails' => $emails
            ));
        }

        /**
         * @Route("/{id}/modify", name="modify")
         * @Method({"POST"})
         */
        public function ModifyAction(Request $request, $id) {

            $repository = $this->getDoctrine()->getRepository('ContactsBundle:Person');
            $person = $repository->findOneById($id);
            $form = $this->CreateFormular($person);
            $form->handleRequest($request);
            if ($form->isValid()) {
                $person = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($person);
                $em->flush();
                $message = "zmodyfikowałeś osobę";
            } else {
                $message = "Wystąpił błąd osoba nie została zmodyfikowana";
            }

            return $this->render('ContactsBundle:PersonController:modify.html.twig', array(
                        'message' => $message,
                        'person' => $person
            ));
        }

        /**
         * @Route("/{id}/delete", name="delete")
         */
        public function DeleteAction($id) {

            $em = $this->getDoctrine()->getManager();
            $person = $em->getRepository('ContactsBundle:Person')->find($id);

            if ($person) {
                $deleted = $person;
                $em->remove($person);
                $em->flush();
                $message = " osoba została usunięta ";
            } else {
                $message = " wystąpił błąd osoba nie została usunięta";
            }

            return $this->render('ContactsBundle:PersonController:delete.html.twig', array(
                        "message" => $message,
                        "person" => $deleted
            ));
        }

        /**
         * @Route("/{id}", requirements={"id" = "[0-9]+"}, name="show_one")
         *
         * @Method({"GET"})
         */
        public function ShowOneAction($id) {

            $repository = $this->getDoctrine()->getRepository('ContactsBundle:Person');
            $person = $repository->findOneById($id);
            $addresses = $this->Addresses($id);
            $telephones = $this->Telephones($id);
            $emails = $this->Emails($id);

            return $this->render('ContactsBundle:PersonController:show_one.html.twig', array(
                        'person' => $person,
                        'addresses' => $addresses,
                        'telephones' => $telephones,
                        'emails' => $emails
            ));
        }

        /**
         * @Route("/", name="show_all")
         * @Method({"GET"})
         */
        public function ShowAllAction() {
            
            $repository = $this->getDoctrine()->getRepository('ContactsBundle:Person');
            $allPersons = $repository->findBy([], ['surname' => 'ASC']);

            return $this->render('ContactsBundle:PersonController:show_all.html.twig', array(
                        'persons' => $allPersons
            ));
        }

        public function CreateAddressFormular(Address $address) {

            $form = $this->createFormBuilder($address)
                    ->add('city')
                    ->add('street')
                    ->add('houseNo')
                    ->add('aptNo', null, array('required' => false))
                    ->add('save', 'submit', array('label' => 'Zatwierdz'))
                    ->getForm();
            return $form;
        }

        /**
         *
         * @Route("/{id}/addAddress", name="add_address_form")
         * @Method({"GET"})
         */
        public function CreateAddressFormAction($id) {

            $address = new Address;
            $form = $this->CreateAddressFormular($address);
            $repository = $this->getDoctrine()->getRepository('ContactsBundle:Person');
            $person = $repository->findOneById($id);

            return $this->render('ContactsBundle:PersonController:create_form.html.twig', array(
                        'form' => $form->createView(),
                        'address' => $address,
                        'owner' => $person
            ));
        }

        /**
         *
         * @Route("/{id}/addAddress", name="add_address")
         * @Method({"POST"})
         */
        public function CreateAddressAction(Request $request, $id) {

            $repository = $this->getDoctrine()->getRepository('ContactsBundle:Person');
            $person = $repository->findOneById($id);
            $address = new Address;
            $form = $this->CreateAddressFormular($address);
            $form->handleRequest($request);
            if ($form->isValid()) {
                $address = $form->getData();
                $address->setPerson($person);
                $em = $this->getDoctrine()->getManager();
                $em->persist($address);
                $em->flush();
                $message = "dodałeś nowy adres ";
            } else {
                $message = " wystąpił błąd adres nie został dodany";
            }
            return $this->render('ContactsBundle:PersonController:create_new.html.twig', array(
                        'message' => $message,
                        'address' => $address,
                        'owner' => $person
            ));
        }

        /**
         *
         * @Route("/{id}/modifyAddress", name="modify_address_form")
         * @Method({"GET"})
         */
        public function ModifyAddressFormAction($id) {
            $repository = $this->getDoctrine()->getRepository('ContactsBundle:Address');
            $address = $repository->findOneById($id);
            $form = $this->CreateAddressFormular($address);


            return $this->render('ContactsBundle:PersonController:create_form.html.twig', array(
                        'form' => $form->createView(),
                        'editAddress' => $address
            ));
        }

        /**
         * @Route("/{id}/modifyAddress", name="modify_address")
         * @Method({"POST"})
         */
        public function ModifyAddressAction(Request $request, $id) {

            $repository = $this->getDoctrine()->getRepository('ContactsBundle:Address');
            $address = $repository->findOneById($id);
            $form = $this->CreateAddressFormular($address);
            $form->handleRequest($request);
            if ($form->isValid()) {
                $address = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($address);
                $em->flush();
                $message = "zmodyfikowałeś adres";
            } else {
                $message = "Wystąpił błąd adres nie został zmodyfikowany";
            }

            return $this->render('ContactsBundle:PersonController:modify.html.twig', array(
                        'message' => $message,
                        'address' => $address
            ));
        }

        /**
         * @Route("/{id}/deleteAddress", name="delete_address")
         */
        public function DeleteAddressAction($id) {

            $em = $this->getDoctrine()->getManager();
            $address = $em->getRepository('ContactsBundle:Address')->find($id);
            if ($address) {
                $deleted = $address;
                $em->remove($address);
                $em->flush();
                $message = " adres został usunięty ";
            }

            return $this->render('ContactsBundle:PersonController:delete.html.twig', array(
                        "message" => $message,
                        "address" => $deleted
            ));
        }

        public function CreateTelephoneForm(Telephone $telephone) {


            $form = $this->createFormBuilder($telephone)
                    ->add('type', ChoiceType::class, array(
                        'choices' => array(
                            'prywatny' => 'prywatny',
                            'służbowy' => 'służbowy'),
                        'choices_as_values' => true,
                    ))
                    ->add('number')
                    ->add('save', 'submit', array('label' => 'Zatwierdź '))
                    ->getForm();
            return $form;
        }

        /**
         *
         * @Route("/{id}/addTelephone", name="add_telephone_form")
         * @Method({"GET"})
         */
        public function CreateTelephoneFormAction($id) {

            $repository = $this->getDoctrine()->getRepository('ContactsBundle:Person');
            $person = $repository->findOneById($id);
            $telephone = new Telephone;
            $form = $this->CreateTelephoneForm($telephone);

            return $this->render('ContactsBundle:PersonController:create_form.html.twig', array(
                        'form' => $form->createView(),
                        'telephone' => $telephone,
                        'owner' => $person
            ));
        }

        /**
         *
         * @Route("/{id}/addTelephone", name="add_telephone")
         * @Method({"POST"})
         */
        public function CreateTelephoneAction(Request $request, $id) {

            $repository = $this->getDoctrine()->getRepository('ContactsBundle:Person');
            $person = $repository->findOneById($id);
            $telephone = new Telephone;
            $form = $this->CreateTelephoneForm($telephone);
            $form->handleRequest($request);
            if ($form->isValid()) {
                $telephone = $form->getData();
                $telephone->setPerson($person);
                $em = $this->getDoctrine()->getManager();
                $em->persist($telephone);
                $em->flush();
                $message = "dodałeś nowy telefon ";
                return $this->render('ContactsBundle:PersonController:create_new.html.twig', array(
                            'message' => $message,
                            'telephone' => $telephone,
                            'owner' => $person
                ));
            } else {

                $message = "telefon musi składać się z nie więcej niż 10 cyfr";
            }

            return $this->render('ContactsBundle:PersonController:create_new.html.twig', array(
                        'message' => $message,
            ));
        }

        /**
         *
         * @Route("/{id}/modifyTelephone", name="modify_telephone_form")
         * @Method({"GET"})
         */
        public function ModifyTelephoneFormAction($id) {
            $repository = $this->getDoctrine()->getRepository('ContactsBundle:Telephone');
            $telephone = $repository->findOneById($id);
            $form = $this->CreateTelephoneForm($telephone);

            return $this->render('ContactsBundle:PersonController:create_form.html.twig', array(
                        'form' => $form->createView()
            ));
        }

        /**
         * @Route("/{id}/modifyTelephone", name="modify_telephone")
         * @Method({"POST"})
         */
        public function ModifyTelephoneAction(Request $request, $id) {

            $repository = $this->getDoctrine()->getRepository('ContactsBundle:Telephone');
            $telephone = $repository->findOneById($id);
            $form = $this->CreateTelephoneForm($telephone);
            $form->handleRequest($request);
            if ($form->isValid()) {
                $telephone = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($telephone);
                $em->flush();
                $message = "zmodyfikowałeś telefon";
            } else {
                $message = "telefon musi składać się z nie więcej niż 10 cyfr";
            }

            return $this->render('ContactsBundle:PersonController:modify.html.twig', array(
                        'message' => $message,
                        'telephone' => $telephone
            ));
        }

        /**
         * @Route("/{id}/deleteTelephone", name="delete_telephone")
         */
        public function DeleteTelephoneAction($id) {

            $em = $this->getDoctrine()->getManager();
            $telephone = $em->getRepository('ContactsBundle:Telephone')->find($id);
            if ($telephone) {
                $deleted = $telephone;
                $em->remove($telephone);
                $em->flush();
                $message = " telefon został usunięty ";
            }

            return $this->render('ContactsBundle:PersonController:delete.html.twig', array(
                        "message" => $message,
                        "telephone" => $deleted
            ));
        }

        public function CreateEmailForm(Email $email) {
            $form = $this->createFormBuilder($email)
                    ->add('type', ChoiceType::class, array(
                        'choices' => array(
                            'prywatny' => 'prywatny',
                            'służbowy' => 'służbowy'),
                        'choices_as_values' => true,
                    ))
                    ->add('email', 'email')
                    ->add('save', 'submit', array('label' => 'zatwierdź'))
                    ->getForm();
            return $form;
        }

        /**
         *
         * @Route("/{id}/addEmail", name="add_email_form")
         * @Method({"GET"})
         */
        public function CreateEmailFormAction($id) {

            $repository = $this->getDoctrine()->getRepository('ContactsBundle:Person');
            $person = $repository->findOneById($id);
            $email = new Email;
            $form = $this->CreateEmailForm($email);

            return $this->render('ContactsBundle:PersonController:create_form.html.twig', array(
                        'form' => $form->createView(),
                        'email' => $email,
                        'owner' => $person
            ));
        }

        /**
         *
         * @Route("/{id}/addEmail", name="add_email")
         * @Method({"POST"})
         */
        public function CreateEmailAction(Request $request, $id) {

            $repository = $this->getDoctrine()->getRepository('ContactsBundle:Person');
            $person = $repository->findOneById($id);
            $email = new Email;
            $form = $this->CreateEmailForm($email);
            $form->handleRequest($request);
            if ($form->isValid()) {
                $email = $form->getData();
                $email->setPerson($person);
                $em = $this->getDoctrine()->getManager();
                $em->persist($email);
                $em->flush();
                $message = "dodałeś nowy email";
            } else {
                $message = " wystąpił błąd email nie został dodany";
            }
            return $this->render('ContactsBundle:PersonController:create_new.html.twig', array(
                        'message' => $message,
                        'email' => $email,
                        "owner" => $person
            ));
        }

        /**
         *
         * @Route("/{id}/modifyEmail", name="modify_email_form")
         * @Method({"GET"})
         */
        public function ModifyEmailFormAction($id) {
            $repository = $this->getDoctrine()->getRepository('ContactsBundle:Email');
            $email = $repository->findOneById($id);
            $form = $this->CreateEmailForm($email);

            return $this->render('ContactsBundle:PersonController:create_form.html.twig', array(
                        'form' => $form->createView()
            ));
        }

        /**
         * @Route("/{id}/modifyEmail", name="modify_email")
         * @Method({"POST"})
         */
        public function ModifyEmailAction(Request $request, $id) {

            $repository = $this->getDoctrine()->getRepository('ContactsBundle:Email');
            $email = $repository->findOneById($id);
            $form = $this->CreateEmailForm($email);
            $form->handleRequest($request);
            if ($form->isValid()) {
                $email = $form->getData();
                $em = $this->getDoctrine()->getManager();
                $em->persist($email);
                $em->flush();
                $message = "zmodyfikowałeś email";
            } else {
                $message = "Wystąpił błąd email nie został zmodyfikowany";
            }

            return $this->render('ContactsBundle:PersonController:modify.html.twig', array(
                        'message' => $message,
                        'email' => $email
            ));
        }

        /**
         * @Route("/{id}/deleteEmail", name="delete_email")
         */
        public function DeleteEmailAction($id) {

            $em = $this->getDoctrine()->getManager();
            $email = $em->getRepository('ContactsBundle:Email')->find($id);

            if ($email) {
                $deleted = $email;
                $em->remove($email);
                $em->flush();
                $message = " email został usunięty ";
            }

            return $this->render('ContactsBundle:PersonController:delete.html.twig', array(
                        "message" => $message,
                        "email" => $deleted
            ));
        }

    }
    