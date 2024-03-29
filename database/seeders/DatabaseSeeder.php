<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\Comment;
use App\Models\Company;
use App\Models\Customer;
use App\Models\Feature;
use App\Models\Login;
use App\Models\Checkout;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     */
    public function run(): void {
        /** Ep 13
         * User::factory()->create(['name' => 'Ted Bossman', 'is_owner' => true]);
         * User::factory()->create(['name' => 'Sarah Seller']);
         * User::factory()->create(['name' => 'Chase Indeals']);
         *
         * User::all()->each(fn ($user) =>
         * Customer::factory(25)->create([
         * 'sales_rep_id' => $user->id
         * ])
         * );
         */

        // User::factory(100000)->create(); Ep14

        /**  Ep15
         * User::factory(50000)->create()->each(fn ($user) =>
         * Company::factory()->create([
         * 'user_id' => $user->id
         * ])
         * );
         */

        /** Ep16
         * Company::factory(10000)->create()->each(fn ($company) =>
         * User::factory(5)->create([
         * 'company_id' => $company->id
         * ])
         * );
         */

        /** Ep17
         * User::factory(60)->create()->each( fn ($user) =>
         * Login::factory(500)->create([
         * 'user_id' => $user->id
         * ])
         * );
         */

        /** Ep18
         * $users = User::factory(100)->create();
         *
         * $this->getBooks()->map(fn($book) => Book::factory()->create($book))
         * ->each(function ($book) use ($users) {
         * $users->random(rand(1,5))
         * ->each(function ($user) use ($book) {
         * Checkout::factory()->create([
         * 'book_id' => $book->id,
         * 'user_id' => $user->id,
         * 'borrowed_date' => fake()->dateTimeBetween('-5 years')
         * ]);
         * });
         * });
         */

        /** Ep19
        $users = User::factory(500)->create();

        User::find(1)->update(['name' => 'Jonathan Reinink']);
        User::find(2)->update(['name' => 'Taylor Otwell']);
        User::find(3)->update(['name' => 'Adam Wathan']);
        User::find(4)->update(['name' => 'Jeffrey Way']);
        User::find(5)->update(['name' => 'Caleb Porzio']);
        User::find(6)->update(['name' => 'Matt Stauffer']);

        $this->getBooks()->each(fn ($book) => Book::factory()->create($book));
         */

        $users = User::factory(250)->create();

        Feature::factory(60)->create()->each(function ($feature) use ($users) {
            Comment::factory(rand(1, 50))->existing()->create([
                'feature_id' => $feature->id
            ]);

            Vote::factory(rand(0, 250))->existing()->create([
                'feature_id' => $feature->id
            ]);
        });
    }

    /** Ep18
     * protected function getBooks() {
     * return collect([
     * ['name' => 'The Pragmatic Programmer: From Journeyman to Master', 'author' => 'Andy Hunt'],
     * ['name' => 'The C Programming Language', 'author' => 'Brian W. Kernighan'],
     * ['name' => 'Clean Code: A Handbook of Agile Software Craftsmanship', 'author' => 'Robert C. Martin'],
     * ['name' => 'Design Patterns: Elements of Reusable Object-Oriented Software', 'author' => 'Erich Gamma'],
     * ['name' => 'Code Complete', 'author' => 'Steve McConnell'],
     * ['name' => 'Introduction to Algorithms', 'author' => 'Thomas H. Cormen'],
     * ['name' => 'Structure and Interpretation of Computer Programs', 'author' => 'Harold Abelson'],
     * ['name' => 'Refactoring: Improving the Design of Existing Code', 'author' => 'Martin Fowler'],
     * ['name' => 'The Mythical Man-Month: Essays on Software Engineering', 'author' => 'Frederick P. Brooks Jr.'],
     * ['name' => 'The Art of Computer Programming, Volumes 1-3 Boxed Set', 'author' => 'Donald Ervin Knuth'],
     * ['name' => 'The C++ Programming Language', 'author' => 'Bjarne Stroustrup'],
     * ['name' => 'The Clean Coder: A Code of Conduct for Professional Programmers', 'author' => 'Robert C. Martin'],
     * ['name' => 'JavaScript: The Good Parts', 'author' => 'Douglas Crockford'],
     * ['name' => 'Head First Design Patterns', 'author' => 'Eric Freeman'],
     * ['name' => 'Working Effectively with Legacy Code', 'author' => 'Michael C. Feathers'],
     * ['name' => 'Compilers: Principles, Techniques, and Tools', 'author' => 'Alfred V. Aho'],
     * ['name' => 'The Little Schemer', 'author' => 'Daniel P. Friedman'],
     * ['name' => 'Modern Operating Systems', 'author' => 'Andrew S. Tanenbaum'],
     * ['name' => 'Test Driven Development: By Example', 'author' => 'Kent Beck'],
     * ['name' => 'The UNIX Programming Environment', 'author' => 'Brian W. Kernighan'],
     * ['name' => 'Algorithms', 'author' => 'Robert Sedgewick'],
     * ['name' => 'Head First Java', 'author' => 'Kathy Sierra'],
     * ['name' => 'xUnit Test Patterns: Refactoring Test Code', 'author' => 'Gerard Meszaros'],
     * ['name' => 'Domain-Driven Design: Tackling Complexity in the Heart of Software', 'author' => 'Eric Evans'],
     * ['name' => 'Agile Software Development, Principles, Patterns, and Practices', 'author' => 'Robert C. Martin'],
     * ['name' => 'Growing Object-Oriented Software, Guided by Tests', 'author' => 'Steve  Freeman'],
     * ['name' => 'Patterns of Enterprise Application Architecture', 'author' => 'Martin Fowler'],
     * ['name' => 'Algorithm Design Manual', 'author' => 'Steve S. Skiena'],
     * ['name' => 'Effective C++: 55 Specific Ways to Improve Your Programs and Designs', 'author' => 'Scott Meyers'],
     * ['name' => 'Programming Ruby: The Pragmatic Programmers\' Guide', 'author' => 'Dave Thomas'],
     * ['name' => 'Real World Haskell: Code You Can Believe In', 'author' => 'Bryan O\'Sullivan'],
     * ['name' => 'Artificial Intelligence: A Modern Approach', 'author' => 'Stuart Russell'],
     * ['name' => 'Learning Python', 'author' => 'Mark Lutz'],
     * ['name' => 'Learning Perl', 'author' => 'Randal L. Schwartz'],
     * ['name' => 'How to Design Programs: An Introduction to Programming and Computing', 'author' => 'Matthias Felleisen'],
     * ['name' => 'The Practice of Programming (Addison-Wesley Professional Computing Series)', 'author' => 'Brian W. Kernighan'],
     * ['name' => 'Joel on Software', 'author' => 'Joel Spolsky'],
     * ['name' => 'Advanced Programming in the UNIX Environment', 'author' => 'Stephen A. Rago'],
     * ['name' => 'Programming Perl', 'author' => 'Tom Christiansen'],
     * ['name' => 'The Elements of Style', 'author' => 'William Strunk Jr.'],
     * ['name' => 'Unix Network Programming, Volume 1: Networking APIs - Sockets and XTI', 'author' => 'W. Richard Stevens'],
     * ['name' => 'Learn You a Haskell for Great Good!: A Beginner\'s Guide', 'author' => 'Miran Lipovača'],
     * ['name' => 'The RSpec Book', 'author' => 'David Chelimsky'],
     * ['name' => 'Concrete Mathematics: A Foundation for Computer Science', 'author' => 'Ronald L. Graham'],
     * ['name' => 'ANSI Common Lisp', 'author' => 'Paul Graham'],
     * ['name' => 'Ship It!', 'author' => 'Jared  Richardson'],
     * ['name' => 'Accelerated C++: Practical Programming by Example', 'author' => 'Andrew Koenig'],
     * ['name' => 'The Rails Way', 'author' => 'Obie Fernandez'],
     * ['name' => 'Expert C Programming: Deep C Secrets', 'author' => 'Peter van der Linden'],
     * ['name' => 'Release It!: Design and Deploy Production-Ready Software', 'author' => 'Michael T. Nygard'],
     * ['name' => 'Refactoring to Patterns', 'author' => 'Joshua Kerievsky'],
     * ['name' => 'C# in Depth', 'author' => 'Jon Skeet'],
     * ['name' => '97 Things Every Programmer Should Know: Collective Wisdom from the Experts', 'author' => 'Kevlin Henney'],
     * ['name' => 'Object-Oriented Software Construction (Book/CD-ROM)', 'author' => 'Bertrand Meyer'],
     * ['name' => 'Agile Web Development with Rails: A Pragmatic Guide', 'author' => 'Dave Thomas'],
     * ['name' => 'Essentials of Programming Languages', 'author' => 'Daniel P. Friedman'],
     * ['name' => 'Fundamental Kotlin', 'author' => 'Miloš  Vasić'],
     * ['name' => 'The Art of Unit Testing: With Examples in .NET', 'author' => 'Roy Osherove'],
     * ['name' => 'Eloquent JavaScript: A Modern Introduction to Programming', 'author' => 'Marijn Haverbeke'],
     * ['name' => 'Extreme Programming Explained: Embrace Change (The XP Series)', 'author' => 'Kent Beck'],
     * ['name' => 'Introduction to the Theory of Computation', 'author' => 'Michael Sipser'],
     * ['name' => 'Assembly Language: Step-By-Step', 'author' => 'Jeff Duntemann'],
     * ['name' => 'Specification by Example: How Successful Teams Deliver the Right Software', 'author' => 'Gojko Adzic'],
     * ['name' => 'The Agile Samurai', 'author' => 'Jonathan Rasmusson'],
     * ['name' => 'Lean from the Trenches', 'author' => 'Henrik Kniberg'],
     * ['name' => 'C++ Standard Library: A Tutorial and Reference', 'author' => 'Nicolai M. Josuttis'],
     * ['name' => 'The Visual Display of Quantitative Information', 'author' => 'Edward R. Tufte'],
     * ['name' => 'Sams Teach Yourself MySQL in 24 Hours', 'author' => 'Julie C. Meloni'],
     * ['name' => 'PHP and MySQL Web Development', 'author' => 'Luke Welling'],
     * ['name' => 'UNIX Network Programming, Volume 2: Interprocess Communications', 'author' => 'W. Richard Stevens'],
     * ['name' => 'Practical Object Oriented Design in Ruby', 'author' => 'Sandi Metz'],
     * ['name' => 'Writing Solid Code', 'author' => 'Steve Maguire'],
     * ['name' => 'Continuous Delivery: Reliable Software Releases Through Build, Test, and Deployment Automation', 'author' => 'Jez Humble'],
     * ['name' => 'Hacker\'s Delight', 'author' => 'Henry S. Warren Jr.'],
     * ['name' => 'Beginning Java 2', 'author' => 'Ivor Horton'],
     * ['name' => 'Haskell: The Craft of Functional Programming', 'author' => 'Simon Thompson'],
     * ['name' => 'Learning Ruby', 'author' => 'Michael J.  Fitzgerald'],
     * ['name' => 'Sams Teach Yourself JavaScript in 24 Hours', 'author' => 'Michael Moncur'],
     * ['name' => 'Peopleware: Productive Projects and Teams', 'author' => 'Tom DeMarco'],
     * ['name' => 'Think Like a Programmer: An Introduction to Creative Problem Solving', 'author' => 'V. Anton Spraul'],
     * ['name' => 'Dependency Injection in .NET', 'author' => 'Mark Seemann'],
     * ['name' => 'Object-Oriented Analysis and Design with Applications', 'author' => 'Grady Booch'],
     * ['name' => 'The Goal: A Process of Ongoing Improvement', 'author' => 'Eliyahu M. Goldratt'],
     * ['name' => 'Make Your Own Neural Network: An In-depth Visual Introduction For Beginners', 'author' => 'Michael Taylor'],
     * ['name' => 'Scrum and XP from the Trenches', 'author' => 'Henrik Kniberg'],
     * ['name' => 'Slack: Getting Past Burnout, Busywork, and the Myth of Total Efficiency', 'author' => 'Tom DeMarco'],
     * ['name' => 'The Software Craftsman: Professionalism, Pragmatism, Pride', 'author' => 'Sandro Mancuso'],
     * ['name' => 'Implementing Lean Software Development: From Concept to Cash', 'author' => 'Mary Poppendieck'],
     * ['name' => 'Engineering a Compiler', 'author' => 'Keith D. Cooper'],
     * ['name' => 'Reviewing C++', 'author' => 'Alex Maureau'],
     * ['name' => 'Sams Teach Yourself Perl in 24 Hours', 'author' => 'Clinton Pierce'],
     * ['name' => 'C: A Reference Manual', 'author' => 'Samuel P. Harbison III'],
     * ['name' => 'STL Tutorial and Reference Guide: C++ Programming with the Standard Template Library', 'author' => 'David R. Musser'],
     * ['name' => 'Manage Your Project Portfolio', 'author' => 'Johanna Rothman'],
     * ['name' => 'Thinking Forth', 'author' => 'Leo Brodie'],
     * ['name' => 'Simulation of Digital Communication Systems using Matlab', 'author' => 'Mathuranathan Viswanathan'],
     * ['name' => 'Your First App: Node.js', 'author' => 'Jim Schubert'],
     * ['name' => 'The Scrumban [R]Evolution: Getting the Most Out of Agile, Scrum, and Lean Kanban', 'author' => 'Ajay Reddy'],
     * ['name' => 'Code Reviews 101', 'author' => 'Giuliana Carullo'],
     * ['name' => 'Python Crash Course: A Hands-On, Project-Based Introduction to Programming', 'author' => 'Eric Matthes'],
     * ]);
     * }
     */

    /** Ep19
    protected function getBooks() {
        return collect([
            ['name' => 'The Pragmatic Programmer: From Journeyman to Master', 'author' => 'Andy Hunt', 'user_id' => 1],
            ['name' => 'The C Programming Language', 'author' => 'Brian W. Kernighan', 'user_id' => null],
            ['name' => 'Clean Code: A Handbook of Agile Software Craftsmanship', 'author' => 'Robert C. Martin', 'user_id' => null],
            ['name' => 'Design Patterns: Elements of Reusable Object-Oriented Software', 'author' => 'Erich Gamma', 'user_id' => null],
            ['name' => 'Code Complete', 'author' => 'Steve McConnell', 'user_id' => null],
            ['name' => 'Introduction to Algorithms', 'author' => 'Thomas H. Cormen', 'user_id' => null],
            ['name' => 'Structure and Interpretation of Computer Programs', 'author' => 'Harold Abelson', 'user_id' => null],
            ['name' => 'Refactoring: Improving the Design of Existing Code', 'author' => 'Martin Fowler', 'user_id' => null],
            ['name' => 'The Mythical Man-Month: Essays on Software Engineering', 'author' => 'Frederick P. Brooks Jr.', 'user_id' => null],
            ['name' => 'The Art of Computer Programming, Volumes 1-3 Boxed Set', 'author' => 'Donald Ervin Knuth', 'user_id' => null],
            ['name' => 'The C++ Programming Language', 'author' => 'Bjarne Stroustrup', 'user_id' => null],
            ['name' => 'The Clean Coder: A Code of Conduct for Professional Programmers', 'author' => 'Robert C. Martin', 'user_id' => null],
            ['name' => 'JavaScript: The Good Parts', 'author' => 'Douglas Crockford', 'user_id' => 2],
            ['name' => 'Head First Design Patterns', 'author' => 'Eric Freeman', 'user_id' => null],
            ['name' => 'Working Effectively with Legacy Code', 'author' => 'Michael C. Feathers', 'user_id' => null],
            ['name' => 'Compilers: Principles, Techniques, and Tools', 'author' => 'Alfred V. Aho', 'user_id' => null],
            ['name' => 'The Little Schemer', 'author' => 'Daniel P. Friedman', 'user_id' => null],
            ['name' => 'Modern Operating Systems', 'author' => 'Andrew S. Tanenbaum', 'user_id' => null],
            ['name' => 'Test Driven Development: By Example', 'author' => 'Kent Beck', 'user_id' => null],
            ['name' => 'The UNIX Programming Environment', 'author' => 'Brian W. Kernighan', 'user_id' => null],
            ['name' => 'Algorithms', 'author' => 'Robert Sedgewick', 'user_id' => null],
            ['name' => 'Head First Java', 'author' => 'Kathy Sierra', 'user_id' => null],
            ['name' => 'xUnit Test Patterns: Refactoring Test Code', 'author' => 'Gerard Meszaros', 'user_id' => null],
            ['name' => 'Domain-Driven Design: Tackling Complexity in the Heart of Software', 'author' => 'Eric Evans', 'user_id' => null],
            ['name' => 'Agile Software Development, Principles, Patterns, and Practices', 'author' => 'Robert C. Martin', 'user_id' => null],
            ['name' => 'Growing Object-Oriented Software, Guided by Tests', 'author' => 'Steve  Freeman', 'user_id' => null],
            ['name' => 'Patterns of Enterprise Application Architecture', 'author' => 'Martin Fowler', 'user_id' => null],
            ['name' => 'Algorithm Design Manual', 'author' => 'Steve S. Skiena', 'user_id' => null],
            ['name' => 'Effective C++: 55 Specific Ways to Improve Your Programs and Designs', 'author' => 'Scott Meyers', 'user_id' => null],
            ['name' => 'Programming Ruby: The Pragmatic Programmers\' Guide', 'author' => 'Dave Thomas', 'user_id' => null],
            ['name' => 'Real World Haskell: Code You Can Believe In', 'author' => 'Bryan O\'Sullivan', 'user_id' => null],
            ['name' => 'Artificial Intelligence: A Modern Approach', 'author' => 'Stuart Russell', 'user_id' => null],
            ['name' => 'Learning Python', 'author' => 'Mark Lutz', 'user_id' => null],
            ['name' => 'Learning Perl', 'author' => 'Randal L. Schwartz', 'user_id' => null],
            ['name' => 'How to Design Programs: An Introduction to Programming and Computing', 'author' => 'Matthias Felleisen', 'user_id' => null],
            ['name' => 'The Practice of Programming (Addison-Wesley Professional Computing Series)', 'author' => 'Brian W. Kernighan', 'user_id' => null],
            ['name' => 'Joel on Software', 'author' => 'Joel Spolsky', 'user_id' => null],
            ['name' => 'Advanced Programming in the UNIX Environment', 'author' => 'Stephen A. Rago', 'user_id' => null],
            ['name' => 'Programming Perl', 'author' => 'Tom Christiansen', 'user_id' => null],
            ['name' => 'The Elements of Style', 'author' => 'William Strunk Jr.', 'user_id' => null],
            ['name' => 'Unix Network Programming, Volume 1: Networking APIs - Sockets and XTI', 'author' => 'W. Richard Stevens', 'user_id' => null],
            ['name' => 'Learn You a Haskell for Great Good!: A Beginner\'s Guide', 'author' => 'Miran Lipovača', 'user_id' => null],
            ['name' => 'The RSpec Book', 'author' => 'David Chelimsky', 'user_id' => null],
            ['name' => 'Concrete Mathematics: A Foundation for Computer Science', 'author' => 'Ronald L. Graham', 'user_id' => null],
            ['name' => 'ANSI Common Lisp', 'author' => 'Paul Graham', 'user_id' => null],
            ['name' => 'Ship It!', 'author' => 'Jared  Richardson', 'user_id' => null],
            ['name' => 'Accelerated C++: Practical Programming by Example', 'author' => 'Andrew Koenig', 'user_id' => null],
            ['name' => 'The Rails Way', 'author' => 'Obie Fernandez', 'user_id' => null],
            ['name' => 'Expert C Programming: Deep C Secrets', 'author' => 'Peter van der Linden', 'user_id' => null],
            ['name' => 'Release It!: Design and Deploy Production-Ready Software', 'author' => 'Michael T. Nygard', 'user_id' => null],
            ['name' => 'Refactoring to Patterns', 'author' => 'Joshua Kerievsky', 'user_id' => null],
            ['name' => 'C# in Depth', 'author' => 'Jon Skeet', 'user_id' => null],
            ['name' => '97 Things Every Programmer Should Know: Collective Wisdom from the Experts', 'author' => 'Kevlin Henney', 'user_id' => null],
            ['name' => 'Object-Oriented Software Construction (Book/CD-ROM)', 'author' => 'Bertrand Meyer', 'user_id' => null],
            ['name' => 'Agile Web Development with Rails: A Pragmatic Guide', 'author' => 'Dave Thomas', 'user_id' => 4],
            ['name' => 'Essentials of Programming Languages', 'author' => 'Daniel P. Friedman', 'user_id' => null],
            ['name' => 'Fundamental Kotlin', 'author' => 'Miloš  Vasić', 'user_id' => null],
            ['name' => 'The Art of Unit Testing: With Examples in .NET', 'author' => 'Roy Osherove', 'user_id' => null],
            ['name' => 'Eloquent JavaScript: A Modern Introduction to Programming', 'author' => 'Marijn Haverbeke', 'user_id' => null],
            ['name' => 'Extreme Programming Explained: Embrace Change (The XP Series)', 'author' => 'Kent Beck', 'user_id' => null],
            ['name' => 'Introduction to the Theory of Computation', 'author' => 'Michael Sipser', 'user_id' => null],
            ['name' => 'Assembly Language: Step-By-Step', 'author' => 'Jeff Duntemann', 'user_id' => null],
            ['name' => 'Specification by Example: How Successful Teams Deliver the Right Software', 'author' => 'Gojko Adzic', 'user_id' => null],
            ['name' => 'The Agile Samurai', 'author' => 'Jonathan Rasmusson', 'user_id' => 3],
            ['name' => 'Lean from the Trenches', 'author' => 'Henrik Kniberg', 'user_id' => null],
            ['name' => 'C++ Standard Library: A Tutorial and Reference', 'author' => 'Nicolai M. Josuttis', 'user_id' => null],
            ['name' => 'The Visual Display of Quantitative Information', 'author' => 'Edward R. Tufte', 'user_id' => null],
            ['name' => 'Sams Teach Yourself MySQL in 24 Hours', 'author' => 'Julie C. Meloni', 'user_id' => null],
            ['name' => 'PHP and MySQL Web Development', 'author' => 'Luke Welling', 'user_id' => null],
            ['name' => 'UNIX Network Programming, Volume 2: Interprocess Communications', 'author' => 'W. Richard Stevens', 'user_id' => null],
            ['name' => 'Practical Object Oriented Design in Ruby', 'author' => 'Sandi Metz', 'user_id' => null],
            ['name' => 'Writing Solid Code', 'author' => 'Steve Maguire', 'user_id' => null],
            ['name' => 'Continuous Delivery: Reliable Software Releases Through Build, Test, and Deployment Automation', 'author' => 'Jez Humble', 'user_id' => null],
            ['name' => 'Hacker\'s Delight', 'author' => 'Henry S. Warren Jr.', 'user_id' => null],
            ['name' => 'Beginning Java 2', 'author' => 'Ivor Horton', 'user_id' => null],
            ['name' => 'Haskell: The Craft of Functional Programming', 'author' => 'Simon Thompson', 'user_id' => null],
            ['name' => 'Learning Ruby', 'author' => 'Michael J.  Fitzgerald', 'user_id' => null],
            ['name' => 'Sams Teach Yourself JavaScript in 24 Hours', 'author' => 'Michael Moncur', 'user_id' => null],
            ['name' => 'Peopleware: Productive Projects and Teams', 'author' => 'Tom DeMarco', 'user_id' => null],
            ['name' => 'Think Like a Programmer: An Introduction to Creative Problem Solving', 'author' => 'V. Anton Spraul', 'user_id' => null],
            ['name' => 'Dependency Injection in .NET', 'author' => 'Mark Seemann', 'user_id' => null],
            ['name' => 'Object-Oriented Analysis and Design with Applications', 'author' => 'Grady Booch', 'user_id' => null],
            ['name' => 'The Goal: A Process of Ongoing Improvement', 'author' => 'Eliyahu M. Goldratt', 'user_id' => null],
            ['name' => 'Make Your Own Neural Network: An In-depth Visual Introduction For Beginners', 'author' => 'Michael Taylor', 'user_id' => null],
            ['name' => 'Scrum and XP from the Trenches', 'author' => 'Henrik Kniberg', 'user_id' => null],
            ['name' => 'Slack: Getting Past Burnout, Busywork, and the Myth of Total Efficiency', 'author' => 'Tom DeMarco', 'user_id' => null],
            ['name' => 'The Software Craftsman: Professionalism, Pragmatism, Pride', 'author' => 'Sandro Mancuso', 'user_id' => 5],
            ['name' => 'Implementing Lean Software Development: From Concept to Cash', 'author' => 'Mary Poppendieck', 'user_id' => null],
            ['name' => 'Engineering a Compiler', 'author' => 'Keith D. Cooper', 'user_id' => null],
            ['name' => 'Reviewing C++', 'author' => 'Alex Maureau', 'user_id' => null],
            ['name' => 'Sams Teach Yourself Perl in 24 Hours', 'author' => 'Clinton Pierce', 'user_id' => null],
            ['name' => 'C: A Reference Manual', 'author' => 'Samuel P. Harbison III', 'user_id' => null],
            ['name' => 'STL Tutorial and Reference Guide: C++ Programming with the Standard Template Library', 'author' => 'David R. Musser', 'user_id' => null],
            ['name' => 'Manage Your Project Portfolio', 'author' => 'Johanna Rothman', 'user_id' => null],
            ['name' => 'Thinking Forth', 'author' => 'Leo Brodie', 'user_id' => null],
            ['name' => 'Simulation of Digital Communication Systems using Matlab', 'author' => 'Mathuranathan Viswanathan', 'user_id' => 6],
            ['name' => 'Your First App: Node.js', 'author' => 'Jim Schubert', 'user_id' => null],
            ['name' => 'The Scrumban [R]Evolution: Getting the Most Out of Agile, Scrum, and Lean Kanban', 'author' => 'Ajay Reddy', 'user_id' => null],
            ['name' => 'Code Reviews 101', 'author' => 'Giuliana Carullo', 'user_id' => null],
            ['name' => 'Python Crash Course: A Hands-On, Project-Based Introduction to Programming', 'author' => 'Eric Matthes', 'user_id' => null],
        ]);
    }
     */
}
