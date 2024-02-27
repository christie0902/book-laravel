 const getData = async () => {
  const response = await fetch(
    "https://classes.codingbootcamp.cz/assets/classes/books-api/latest-books.php"
  );
  const data = await response.json();
  //   console.log(data);
  processData(data);
};

const container = document.getElementById("latest-books");

const processData = (data) => {
  data.forEach((book) => {
    const bookCard = document.createElement("div");
    bookCard.classList.add("container");

    const title = document.createElement("h1");
    title.textContent = book.title;

    const image = document.createElement("img");
    image.setAttribute("src", book.image);

    const price = document.createElement("h3");
    price.textContent = book.price;

    const description = document.createElement("div");
    description.textContent = book.description.replace(/<[^>]*>/g, "");

    const authorInfoContainer = document.createElement("div");
    authorInfoContainer.classList.add("info-container");

    book.authors.forEach((author) => {
      const authorName = document.createElement("h3");
      authorName.textContent = `Author: ${author.name}`;

      const authorBio = document.createElement("p");
      const removeTagsBio = author.bio ? author.bio.replace(/<[^>]*>/g, "") : "";
      authorBio.textContent = `Bio: ${removeTagsBio}`;

      authorInfoContainer.appendChild(authorName);
      authorInfoContainer.appendChild(authorBio);
    });

    bookCard.appendChild(title);
    bookCard.appendChild(image);
    bookCard.appendChild(price);
    bookCard.appendChild(description);
    bookCard.appendChild(authorInfoContainer);

    container.appendChild(bookCard);
  });
};

getData();
